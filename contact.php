<?php include("includes/header.php"); ?>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,700&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
    :root {
        --gold: #c5a059;
        --dark-card: #1a1a1a;
        --input-bg: #252525;
    }

    .contact-wrapper {
        max-width: 1200px;
        margin: 60px auto;
        padding: 0 20px;
        display: grid;
        grid-template-columns: 1.2fr 1fr;
        gap: 60px;
        align-items: start;
    }

    .contact-info h2 {
        font-family: 'Playfair Display', serif;
        font-size: 3.5rem;
        color: var(--gold);
        margin-bottom: 10px;
        font-style: italic;
    }

    .contact-info p.lead {
        color: #888;
        font-size: 1.1rem;
        margin-bottom: 40px;
    }

    /* --- FORM STYLING --- */
    .contact-form-card {
        background: var(--dark-card);
        padding: 40px;
        border-radius: 20px;
        border: 1px solid rgba(197, 160, 89, 0.1);
        box-shadow: 0 20px 40px rgba(0,0,0,0.3);
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: var(--gold);
        margin-bottom: 8px;
    }

    .form-group input, 
    .form-group textarea {
        width: 100%;
        padding: 15px;
        background: var(--input-bg);
        border: 1px solid #333;
        border-radius: 8px;
        color: #fff;
        font-family: 'Poppins', sans-serif;
        transition: all 0.3s;
    }

    .form-group input:focus, 
    .form-group textarea:focus {
        outline: none;
        border-color: var(--gold);
        box-shadow: 0 0 10px rgba(197, 160, 89, 0.1);
    }

    .submit-btn {
        width: 100%;
        padding: 18px;
        background: var(--gold);
        color: #000;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 2px;
        cursor: pointer;
        transition: 0.4s;
    }

    .submit-btn:hover {
        background: #fff;
        transform: translateY(-3px);
    }

    /* --- DETAILS SECTION --- */
    .detail-item {
        margin-bottom: 30px;
    }

    .detail-item h4 {
        font-family: 'Playfair Display', serif;
        font-size: 1.4rem;
        color: #fff;
        margin-bottom: 5px;
    }

    .detail-item p {
        color: #aaa;
        font-weight: 300;
        line-height: 1.6;
    }

    .map-placeholder {
        width: 100%;
        height: 250px;
        background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), 
                    url('https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?auto=format&fit=crop&q=80&w=1000');
        background-size: cover;
        background-position: center;
        border-radius: 15px;
        margin-top: 40px;
        border: 1px solid var(--gold);
    }

    @media (max-width: 968px) {
        .contact-wrapper { grid-template-columns: 1fr; }
        .contact-info h2 { font-size: 2.5rem; }
    }
</style>

<div class="contact-wrapper">
    
    <div class="contact-form-side">
        <div class="contact-info">
            <h2>Get In Touch</h2>
            <p class="lead">Book a table or send us a message for special events.</p>
        </div>

        <div class="contact-form-card">
            <form action="process-contact.php" method="POST">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="name" placeholder="John Doe" required>
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="john@example.com" required>
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea name="message" rows="5" placeholder="Tell us how we can help..."></textarea>
                </div>
                <button type="submit" class="submit-btn">Send Message</button>
            </form>
        </div>
    </div>

    <div class="contact-details-side">
        <div class="detail-item">
            <h4>Location</h4>
            <p>123 Culinary Avenue, Foodie District<br>New York, NY 10001</p>
        </div>

        <div class="detail-item">
            <h4>Hours of Operation</h4>
            <p>Mon - Thu: 11:00 AM - 10:00 PM<br>Fri - Sun: 11:00 AM - 11:30 PM</p>
        </div>

        <div class="detail-item">
            <h4>Reservations</h4>
            <p>Phone: +1 (234) 567-890<br>Email: bookings@resto.com</p>
        </div>

        <div class="map-placeholder"></div>
    </div>

</div>

<?php include("includes/footer.php"); ?>