<?php
session_start();
if(!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include("../includes/db.php");

// Get ID
$id = $_GET['id'];

// Perform Deletion
$sql = "DELETE FROM foods WHERE id=$id";
$query = mysqli_query($conn, $sql);

// We keep the PHP logic, but instead of an instant header redirect, 
// we show a high-end "Removal" UI for 1.5 seconds.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Updating Vault...</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #0f0f0f;
            color: white;
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            overflow: hidden;
        }

        .loader-container {
            text-align: center;
            background: rgba(255, 255, 255, 0.03);
            padding: 50px;
            border-radius: 30px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(197, 160, 89, 0.2);
            box-shadow: 0 25px 50px rgba(0,0,0,0.5);
        }

        /* Fancy Gold Spinner */
        .spinner {
            width: 50px;
            height: 50px;
            border: 3px solid rgba(197, 160, 89, 0.1);
            border-top: 3px solid #c5a059;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin: 0 auto 20px;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        h2 {
            font-weight: 300;
            letter-spacing: 2px;
            font-size: 1rem;
            color: #c5a059;
            text-transform: uppercase;
        }

        .success-check {
            color: #2ecc71;
            font-size: 3rem;
            display: none;
        }
    </style>
</head>
<body>

    <div class="loader-container">
        <div id="loader" class="spinner"></div>
        <div id="check" class="success-check">✓</div>
        <h2 id="status-text">Removing from Menu...</h2>
    </div>

    <script>
        // Smooth transition back to manage-food.php
        setTimeout(() => {
            document.getElementById('loader').style.display = 'none';
            document.getElementById('check').style.display = 'block';
            document.getElementById('status-text').innerText = 'Dish Removed';
            document.getElementById('status-text').style.color = '#2ecc71';
            
            setTimeout(() => {
                window.location.href = 'manage-food.php';
            }, 800);
        }, 1200);
    </script>

</body>
</html>