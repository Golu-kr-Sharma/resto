<?php include("includes/header.php"); ?>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
    :root {
        --accent: #c5a059;
        --dark-bg: #121212;
        --card-bg: #1a1a1a;
        --text-muted: #b0b0b0;
    }

    body {
        background-color: var(--dark-bg);
        color: #fff;
        font-family: 'Poppins', sans-serif;
        padding-top: 60px;
    }

    .about-section {
        max-width: 1100px;
        margin: 60px auto;
        padding: 0 20px;
    }

    .about-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 50px;
        align-items: center;
    }

    .about-text {
        flex: 1;
        min-width: 300px;
    }

    .about-image-container {
        flex: 1;
        min-width: 300px;
        position: relative;
    }

    /* AI Generated Visual Style for Restaurant Decor */
    .about-image-container img {
        width: 100%;
        border-radius: 5px;
        box-shadow: 30px 30px 0px var(--accent); /* Fancy offset border */
        filter: grayscale(20%) brightness(80%);
    }

    h2 {
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        color: var(--accent);
        margin-bottom: 20px;
        font-style: italic;
    }

    h3 {
        font-family: 'Playfair Display', serif;
        font-size: 1.8rem;
        color: #fff;
        margin-top: 40px;
        border-left: 3px solid var(--accent);
        padding-left: 15px;
    }

    p {
        font-size: 1.05rem;
        line-height: 1.8;
        color: var(--text-muted);
        font-weight: 300;
    }

    .highlight {
        color: #fff;
        font-weight: 600;
    }

    /* Why Choose Us Section */
    .features-list {
        list-style: none;
        padding: 0;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
        margin-top: 20px;
    }

    .features-list li {
        background: var(--card-bg);
        padding: 15px;
        border-radius: 8px;
        font-size: 0.9rem;
        border: 1px solid rgba(197, 160, 89, 0.1);
        display: flex;
        align-items: center;
    }

    .features-list li::before {
        content: '✦';
        color: var(--accent);
        margin-right: 10px;
        font-size: 1.2rem;
    }

    @media (max-width: 768px) {
        h2 { font-size: 2.5rem; }
        .about-image-container { order: -1; margin-bottom: 40px; }
        .about-image-container img { box-shadow: 15px 15px 0px var(--accent); }
        .features-list { grid-template-columns: 1fr; }
    }
</style>

<div class="about-section">
    <div class="about-grid">
        
        <div class="about-text">
            <h2>Our Story</h2>
            <p>
                Founded in <span class="highlight">2026</span>, <span class="highlight">Resto</span> emerged from a passion for culinary precision and the art of hospitality. What began as a simple vision to harmonize modern flavor with timeless hygiene has evolved into a sanctuary for food lovers.
            </p>
            
            <p>
                Every plate we serve is a testament to our commitment: 
                <span style="color:var(--accent);">Delicious food • Fresh ingredients • Great taste.</span>
            </p>

            <h3>Our Mission</h3>
            <p>
                To redefine the dining landscape by delivering sophisticated, healthy, and affordable 
                cuisine while maintaining an uncompromising standard of cleanliness and warmth.
            </p>
        </div>

        <div class="about-image-container">
            <img src="https://images.unsplash.com/photo-1550966842-2410b1849881?auto=format&fit=crop&q=80&w=1000" alt="Resto Interior">
        </div>

    </div>

    <div style="margin-top: 60px;">
        <h3>Why Choose Resto?</h3>
        <ul class="features-list">
            <li>Ethically Sourced Ingredients</li>
            <li>Masterfully Trained Chefs</li>
            <li>Bespoke Dining Atmosphere</li>
            <li>Excellence in Service</li>
            <li>Modern Hygiene Protocols</li>
            <li>Signature Secret Recipes</li>
        </ul>
    </div>
</div>

<?php include("includes/footer.php"); ?>