<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resto | Culinary Excellence</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        :root {
            --primary-gold: #c5a059;
            --dark-bg: #121212;
            --text-light: #ffffff;
            --overlay: rgba(0, 0, 0, 0.6);
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: var(--dark-bg);
            color: var(--text-light);
            overflow-x: hidden;
        }

        header {
            background: rgba(18, 18, 18, 0.95);
            backdrop-filter: blur(10px);
            padding: 20px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            width: 90%;
            top: 0;
            z-index: 1000;
            border-bottom: 1px solid rgba(197, 160, 89, 0.2);
        }

        header h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            margin: 0;
            color: var(--primary-gold);
            letter-spacing: 2px;
        }

        nav a {
            color: white;
            margin-left: 25px;
            text-decoration: none;
            font-weight: 300;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 1.5px;
            transition: 0.3s;
        }

        nav a:hover {
            color: var(--primary-gold);
        }

        .hero {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            /* Using a high-quality AI-style food photography placeholder */
            background: linear-gradient(var(--overlay), var(--overlay)), 
                        url('https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?auto=format&fit=crop&q=80&w=2070');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .hero h1 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(3rem, 8vw, 5rem);
            margin-bottom: 10px;
            font-style: italic;
        }

        .hero p {
            font-size: 1.2rem;
            font-weight: 300;
            letter-spacing: 4px;
            text-transform: uppercase;
            margin-bottom: 30px;
            color: var(--primary-gold);
        }

        .btn-container {
            display: flex;
            gap: 20px;
        }

        .hero a {
            display: inline-block;
            padding: 15px 35px;
            text-decoration: none;
            border-radius: 0;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: all 0.4s ease;
        }

        .btn-primary {
            background: var(--primary-gold);
            color: #000;
        }

        .btn-primary:hover {
            background: #fff;
            transform: translateY(-3px);
        }

        .btn-outline {
            border: 1px solid #fff;
            color: #fff;
        }

        .btn-outline:hover {
            background: #fff;
            color: #000;
        }

        footer {
            background: #0a0a0a;
            color: #777;
            text-align: center;
            padding: 40px;
            font-size: 0.9rem;
            border-top: 1px solid #222;
        }

        /* Mobile Adjustments */
        @media (max-width: 768px) {
            header { flex-direction: column; padding: 15px; }
            nav { margin-top: 15px; }
            nav a { margin: 0 10px; font-size: 0.7rem; }
            .btn-container { flex-direction: column; }
        }
    </style>
</head>
<body>

<header>
    <h1>RESTO</h1>
    <nav>
        <a href="index.html">Home</a>
        <a href="menu.php">Menu</a>
        <a href="about.php">About</a>
        <a href="contact.php">Contact</a>
    </nav>
</header>

<section class="hero">
    <h1>Art of Dining</h1>
    <p>Delicious food • Fresh ingredients • Great taste</p>

    <div class="btn-container">
        <a href="menu.php" class="btn-primary">View Menu</a>
        <a href="contact.php" class="btn-outline">Reservations</a>
    </div>
</section>

<footer>
    <p>© 2026 RESTO LUXURY DINING. <br> Crafted for the finest palates.</p>
</footer>

</body>
</html>