<?php include("includes/db.php"); ?>
<?php include("includes/header.php"); ?>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
    :root {
        --accent: #c5a059;
        --dark-card: #1c1c1c;
        --text-muted: #a0a0a0;
    }

    body {
        background-color: #121212;
        color: #fff;
        font-family: 'Poppins', sans-serif;
        padding-top: 80px; /* Space for the fixed header */
    }

    .menu-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 20px;
    }

    h2 {
        font-family: 'Playfair Display', serif;
        font-size: 3rem;
        text-align: center;
        color: var(--accent);
        margin-bottom: 50px;
        letter-spacing: 2px;
    }

    /* Grid Layout for Food Items */
    .menu-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 30px;
    }

    /* Modern Food Card */
    .food-card {
        background: var(--dark-card);
        border-radius: 20px;
        overflow: hidden;
        transition: transform 0.4s ease, box-shadow 0.4s ease;
        border: 1px solid rgba(255, 255, 255, 0.05);
        position: relative;
    }

    .food-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        border-color: var(--accent);
    }

    .food-image-wrapper {
        width: 100%;
        height: 250px;
        overflow: hidden;
    }

    .food-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s ease;
    }

    .food-card:hover img {
        transform: scale(1.1);
    }

    .food-info {
        padding: 25px;
    }

    .food-card h3 {
        font-family: 'Playfair Display', serif;
        font-size: 1.5rem;
        margin: 0 0 10px 0;
        color: #fff;
    }

    .food-description {
        font-size: 0.9rem;
        color: var(--text-muted);
        line-height: 1.6;
        margin-bottom: 20px;
        height: 50px;
        overflow: hidden;
    }

    .price-tag {
        font-size: 1.3rem;
        font-weight: 600;
        color: var(--accent);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .order-dot {
        width: 8px;
        height: 8px;
        background: var(--accent);
        border-radius: 50%;
        display: inline-block;
    }
</style>

<div class="menu-container">
    <h2>Our Culinary Menu</h2>

    <div class="menu-grid">
        <?php
        $result = mysqli_query($conn, "SELECT * FROM foods");
        while($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="food-card">
                <div class="food-image-wrapper">
                    <img src="assets/images/food/<?php echo $row['image']; ?>" 
                         onerror="this.src='https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&q=80&w=1000'" 
                         alt="<?php echo $row['name']; ?>">
                </div>
                
                <div class="food-info">
                    <h3><?php echo $row['name']; ?></h3>
                    <p class="food-description"><?php echo $row['description']; ?></p>
                    <div class="price-tag">
                        <span>₹<?php echo $row['price']; ?></span>
                        <span class="order-dot"></span>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php include("includes/footer.php"); ?>