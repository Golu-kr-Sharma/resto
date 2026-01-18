</div> <style>
    /* --- MODERN FOOTER --- */
    .site-footer {
        background-color: #080808;
        padding: 80px 8% 40px;
        margin-top: 100px;
        border-top: 1px solid #1a1a1a;
    }

    .footer-grid {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr;
        gap: 50px;
        margin-bottom: 60px;
    }

    .footer-about h2 {
        font-family: 'Playfair Display', serif;
        color: var(--gold);
        font-size: 2rem;
        margin: 0 0 20px 0;
    }

    .footer-about p {
        color: #888;
        line-height: 1.8;
        max-width: 400px;
        font-weight: 300;
    }

    .footer-links h4 {
        color: #fff;
        text-transform: uppercase;
        font-size: 0.9rem;
        letter-spacing: 2px;
        margin-bottom: 25px;
    }

    .footer-links ul {
        list-style: none;
        padding: 0;
    }

    .footer-links ul li {
        margin-bottom: 12px;
    }

    .footer-links ul li a {
        color: #666;
        text-decoration: none;
        transition: 0.3s;
        font-size: 0.9rem;
    }

    .footer-links ul li a:hover {
        color: var(--gold);
        padding-left: 5px;
    }

    .footer-bottom {
        text-align: center;
        padding-top: 40px;
        border-top: 1px solid #1a1a1a;
    }

    .footer-bottom p {
        color: #444;
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    @media (max-width: 768px) {
        .footer-grid { grid-template-columns: 1fr; text-align: center; }
        .footer-about p { margin: 0 auto; }
        .nav-menu { display: none; } /* Mobile toggle recommended for full app */
    }
</style>

<footer class="site-footer">
    <div class="footer-grid">
        <div class="footer-about">
            <h2>RESTO</h2>
            <p>Crafting unforgettable culinary journeys since 2026. Join us for an experience where every flavor tells a story of passion and fresh ingredients.</p>
        </div>

        <div class="footer-links">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="menu.php">Our Menu</a></li>
                <li><a href="about.php">Our Story</a></li>
                <li><a href="contact.php">Reservations</a></li>
            </ul>
        </div>

        <div class="footer-links">
            <h4>Connect</h4>
            <ul>
                <li><a href="#">Instagram</a></li>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Twitter</a></li>
                <li><a href="login.php">Admin Login</a></li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <p>© 2026 Resto Culinary Group. All Rights Reserved.</p>
    </div>
</footer>

</body>
</html>