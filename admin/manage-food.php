<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header("Location: login.php");
}

include("../includes/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resto | Inventory Management</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --gold: #c5a059;
            --bg-dark: #0f0f0f;
            --card-dark: #1a1a1a;
            --danger: #ff4d4d;
            --success: #2ecc71;
            --text-gray: #a0a0a0;
        }

        body {
            background-color: var(--bg-dark);
            color: #fff;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 40px;
        }

        .admin-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto 40px auto;
        }

        .admin-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            color: var(--gold);
            margin: 0;
        }

        .back-btn {
            text-decoration: none;
            color: var(--text-gray);
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            transition: color 0.3s;
        }

        .back-btn:hover {
            color: var(--gold);
        }

        /* Table Design */
        .table-container {
            max-width: 1200px;
            margin: 0 auto;
            background: var(--card-dark);
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.5);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        thead {
            background: rgba(197, 160, 89, 0.1);
        }

        th {
            padding: 20px;
            color: var(--gold);
            font-weight: 500;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
        }

        td {
            padding: 15px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            vertical-align: middle;
            font-size: 0.95rem;
        }

        tr:hover {
            background: rgba(255, 255, 255, 0.02);
        }

        .food-img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 12px;
            border: 2px solid rgba(197, 160, 89, 0.3);
        }

        /* Action Buttons */
        .btn-edit {
            color: var(--success);
            padding: 8px 12px;
            border: 1px solid var(--success);
            border-radius: 6px;
            font-size: 0.85rem;
            transition: all 0.3s;
            margin-right: 5px;
            display: inline-block;
        }

        .btn-edit:hover {
            background: var(--success);
            color: #000;
        }

        .btn-delete {
            color: var(--danger);
            padding: 8px 12px;
            border: 1px solid var(--danger);
            border-radius: 6px;
            font-size: 0.85rem;
            transition: all 0.3s;
            display: inline-block;
        }

        .btn-delete:hover {
            background: var(--danger);
            color: #fff;
        }

        .category-badge {
            background: rgba(255, 255, 255, 0.05);
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.75rem;
            color: var(--text-gray);
        }

        .price-text {
            color: #fff;
            font-weight: 600;
        }
    </style>
</head>
<body>

<div class="admin-header">
    <div>
        <a href="dashboard.php" class="back-btn">← Back to Dashboard</a>
        <h2>Manage Food Items</h2>
    </div>
    <a href="add-food.php" class="btn-edit" style="background: var(--gold); color: #000; border: none; font-weight: 600;">+ Add New Item</a>
</div>

<div class="table-container">
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Dish Preview</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM foods");
            while($row = mysqli_fetch_assoc($result)) {
            ?>
            <tr>
                <td style="color: var(--gold);">#<?php echo $row['id']; ?></td>
                <td>
                    <img src="../assets/images/food/<?php echo $row['image']; ?>" class="food-img" alt="dish">
                </td>
                <td style="font-weight: 500;"><?php echo $row['name']; ?></td>
                <td>
                    <span class="category-badge"><?php echo $row['category']; ?></span>
                </td>
                <td class="price-text">₹<?php echo $row['price']; ?></td>
                <td>
                    <a href="edit-food.php?id=<?php echo $row['id']; ?>" class="btn-edit">✏ Edit</a>
                    <a href="delete-food.php?id=<?php echo $row['id']; ?>" 
                       class="btn-delete"
                       onclick="return confirm('Are you sure you want to remove this item?')">
                       ❌ Delete
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>