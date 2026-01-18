<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header("Location: login.php");
}
include("../includes/db.php");

// Fetch counts for the stats bar (Optional but recommended)
$food_count = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM foods"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resto | Executive Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --gold: #c5a059;
            --bg: #0f0f0f;
            --sidebar: #161616;
            --card: #1e1e1e;
        }

        body {
            margin: 0;
            background-color: var(--bg);
            color: #fff;
            font-family: 'Poppins', sans-serif;
            display: flex;
            min-height: 100vh;
        }

        /* --- SIDEBAR --- */
        .sidebar {
            width: 280px;
            background: var(--sidebar);
            border-right: 1px solid rgba(255,255,255,0.05);
            padding: 40px 20px;
            display: flex;
            flex-direction: column;
        }

        .sidebar h1 {
            font-family: 'Playfair Display', serif;
            color: var(--gold);
            font-size: 1.8rem;
            margin-bottom: 50px;
            text-align: center;
        }

        .nav-link {
            color: #888;
            text-decoration: none;
            padding: 15px 20px;
            border-radius: 10px;
            margin-bottom: 10px;
            transition: 0.3s;
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .nav-link:hover, .nav-link.active {
            background: rgba(197, 160, 89, 0.1);
            color: var(--gold);
        }

        /* --- MAIN CONTENT --- */
        .main-content {
            flex: 1;
            padding: 60px;
        }

        .welcome-header {
            margin-bottom: 40px;
        }

        .welcome-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            margin: 0;
        }

        .welcome-header p {
            color: #666;
            margin-top: 5px;
        }

        /* --- STATS BAR --- */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 50px;
        }

        .stat-box {
            background: var(--card);
            padding: 25px;
            border-radius: 15px;
            border: 1px solid rgba(255,255,255,0.03);
            text-align: center;
        }

        .stat-box span {
            display: block;
            color: #666;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .stat-box h3 {
            font-size: 2rem;
            margin: 10px 0 0;
            color: var(--gold);
        }

        /* --- ACTION CARDS --- */
        .action-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .action-card {
            background: linear-gradient(145deg, #1e1e1e, #161616);
            padding: 40px;
            border-radius: 20px;
            text-decoration: none;
            color: #fff;
            border: 1px solid rgba(255,255,255,0.05);
            transition: 0.4s;
            position: relative;
            overflow: hidden;
        }

        .action-card:hover {
            transform: translateY(-10px);
            border-color: var(--gold);
            box-shadow: 0 20px 40px rgba(0,0,0,0.4);
        }

        .action-card h4 {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            margin: 0 0 10px 0;
            color: var(--gold);
        }

        .action-card p {
            font-size: 0.9rem;
            color: #888;
            margin: 0;
        }

        .logout-btn {
            margin-top: auto;
            color: #ff4d4d;
            border: 1px solid rgba(255, 77, 77, 0.2);
            text-align: center;
            padding: 12px;
            border-radius: 8px;
            text-decoration: none;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #ff4d4d;
            color: #fff;
        }
    </style>
</head>
<body>

    <div class="sidebar">
        <h1>RESTO.</h1>
        <a href="dashboard.php" class="nav-link active">🏠 Dashboard</a>
        <a href="manage-food.php" class="nav-link">🍽 Manage Menu</a>
        <a href="add-food.php" class="nav-link">➕ Add Dish</a>
        
        <a href="logout.php" class="logout-btn">Logout System</a>
    </div>

    <div class="main-content">
        <div class="welcome-header">
            <h2>Welcome, <?php echo $_SESSION['admin']; ?></h2>
            <p>Here is what's happening in your kitchen today.</p>
        </div>

        <div class="stats-grid">
            <div class="stat-box">
                <span>Total Dishes</span>
                <h3><?php echo $food_count; ?></h3>
            </div>
            <div class="stat-box">
                <span>Status</span>
                <h3 style="color: #2ecc71;">Online</h3>
            </div>
            <div class="stat-box">
                <span>System Year</span>
                <h3>2026</h3>
            </div>
        </div>

        <div class="action-grid">
            <a href="add-food.php" class="action-card">
                <h4>Add Food Item</h4>
                <p>Upload new culinary creations and AI-generated imagery to your menu.</p>
            </a>

            <a href="manage-food.php" class="action-card">
                <h4>Manage Food Items</h4>
                <p>Edit prices, descriptions, or remove outdated dishes from the gallery.</p>
            </a>
        </div>
    </div>

</body>
</html>