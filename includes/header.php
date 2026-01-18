<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --gold: #c5a059;
            --dark-bg: #0f0f0f;
            --glass: rgba(15, 15, 15, 0.85);
        }

        body {
            margin: 0;
            padding: 0;
            background-color: var(--dark-bg);
            color: #ffffff;
            font-family: 'Poppins', sans-serif;
        }

        /* --- MODERN HEADER --- */
        .site-header {
            position: fixed;
            top: 0;
            width: 100%;
            height: 85px;
            background: var(--glass);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 8%;
            box-sizing: border-box;
            z-index: 9999;
            border-bottom: 1px solid rgba(197, 160, 89, 0.15);
        }

        .logo-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: var(--gold);
            text-decoration: none;
            font-weight: 700;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .nav-menu {
            display: flex;
            gap: 35px;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-menu a {
            text-decoration: none;
            color: #fff;
            font-size: 0.85rem;
            font-weight: 400;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            transition: 0.3s ease;
            position: relative;
        }

        .nav-menu a:hover {
            color: var(--gold);
        }

        /* Animated Hover Line */
        .nav-menu a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 1px;
            bottom: -5px;
            left: 0;
            background: var(--gold);
            transition: width 0.3s ease;
        }

        .nav-menu a:hover::after {
            width: 100%;
        }

        .content-wrapper {
            padding-top: 100px; /* Space for fixed header */
        }
    </style>
</head>
<body>

<header class="site-header">
    <a href="index.php" class="logo-brand">RESTO</a>
    <nav>
        <ul class="nav-menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="menu.php">Menu</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
</header>

<div class="content-wrapper">