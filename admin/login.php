<?php
session_start();
include("../includes/db.php");

$error = "";

if (isset($_POST['login'])) {

    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);

    // Prepared statement (secure)
    $stmt = mysqli_prepare($conn, "SELECT username FROM admin WHERE username=? AND password=?");
    mysqli_stmt_bind_param($stmt, "ss", $user, $pass);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);

    if (mysqli_stmt_num_rows($stmt) === 1) {
        $_SESSION['admin'] = $user;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid Username or Password";
    }

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resto | Admin Portal</title>

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-gold: #c5a059;
            --bg-dark: #0f0f0f;
            --glass: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.1);
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)),
            url('https://images.unsplash.com/photo-1551632436-cbf8dd35adfa?auto=format&fit=crop&q=80&w=2071');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        .login-card {
            background: var(--glass);
            backdrop-filter: blur(20px);
            padding: 50px 40px;
            border-radius: 20px;
            border: 1px solid var(--glass-border);
            max-width: 400px;
            width: 100%;
            box-shadow: 0 25px 50px rgba(0,0,0,0.5);
            text-align: center;
        }

        .login-card h2 {
            font-family: 'Playfair Display', serif;
            color: var(--primary-gold);
            margin-bottom: 10px;
        }

        .login-card p {
            color: #888;
            font-size: 0.9rem;
            margin-bottom: 30px;
        }

        .login-card input {
            width: 100%;
            padding: 14px;
            margin-bottom: 15px;
            background: rgba(255,255,255,0.05);
            border: 1px solid var(--glass-border);
            border-radius: 8px;
            color: #fff;
        }

        .login-card input:focus {
            outline: none;
            border-color: var(--primary-gold);
        }

        .login-card button {
            width: 100%;
            padding: 14px;
            background: var(--primary-gold);
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
        }

        .login-card button:hover {
            background: #d4b475;
        }

        .error-msg {
            background: rgba(255, 59, 48, 0.1);
            color: #ff3b30;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 0.85rem;
        }

        .back-home {
            display: block;
            margin-top: 20px;
            color: #777;
            font-size: 0.8rem;
            text-decoration: none;
        }

        .back-home:hover {
            color: var(--primary-gold);
        }
    </style>
</head>
<body>

<div class="login-card">
    <h2>Resto Admin</h2>
    <p>Login to manage your restaurant</p>

    <?php if (!empty($error)) { ?>
        <div class="error-msg"><?php echo $error; ?></div>
    <?php } ?>

    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" name="login">Access Dashboard</button>
    </form>

    <a href="../index.html" class="back-home">← Back to Website</a>
</div>

</body>
</html>
