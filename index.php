<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Delivery Service</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <header>
        <div class="logo"><i class="fas fa-utensils"></i> Oyesdelight</div>
        <nav>
    <button class="toggle-nav"aria-label="Toggle navigation">&#9776;</button>
    <ul class="nav-links">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#categories">Menu</a></li>
        <li><a href="#contact">Contact</a></li>
        <li><a href="#social">Socials</a></li>
    </ul>
    </nav>
    </header>
    <main>
        <section id="home" class="hero">
            <h1 class="animated-text">Delicious Meals, Delivered Fresh to Your Doorstep!</h1>
            <p class="animated-text">Experience the taste of freshness with our carefully curated meals, snacks, and groceries. Order now and enjoy fast, reliable delivery!</p>
            <div class="cta-buttons">
                <a href="signup.php" class="button primary">Get started here</a>
                <a href="login.php" class="button secondary">Explore Our Menu</a>
            </div>
        </section>

        <section id="about" class="about">
            <h2>About Us</h2>
            <p>At Oye’s Delight, we believe that every bite should be an experience—one that brings warmth, comfort, and a little bit of magic to your day. Whether you're craving rich, homemade flavors or looking for the perfect treat to share, 
            we’ve got something special just for you.
            Our passion for crafting delicious, high-quality delights comes from a deep love for good food and great company. From our signature treats to carefully curated recipes, everything we make is designed to bring joy with every bite.
            So, whether you’re here to satisfy a sweet tooth, discover something new, or simply indulge in your favorites, Oye’s Delight is here to make every moment a little more delicious.
            Taste the joy. Feel the delight. Welcome to Oye’s Delight!</p>
        </section>

        <section class="why-choose-us">
            <h2>Why Choose Us?</h2>
            <ul>
                <li style="list-style: none;" >✅Fresh & High-Quality Ingredients – Every product is carefully selected to ensure top-tier quality.</li>
                <li style="list-style: none;">✅ Fast & Reliable Delivery – Get your orders delivered on time, every time.</li>
                <li style="list-style: none;">✅ Affordable Prices – Enjoy great food without breaking the bank.</li>
                <li style="list-style: none;">✅ Secure Payments – Multiple payment options with full encryption for safety.</li>
            </ul>
        </section>

        <section id="categories" class="categories">
            <h2>Categories</h2>
            <div class="category-list">
                <div class="category-item">
                    <h3>Meals & Ready-to-Eat</h3>
                    <p>Freshly prepared dishes delivered hot and delicious.</p>
                </div>
                <div class="category-item">
                    <h3>Groceries & Essentials</h3>
                    <p>Everything you need for home cooking, from spices to fresh veggies.</p>
                </div>
                <div class="category-item">
                    <h3>Snacks & Beverages</h3>
                    <p>Treat yourself to tasty snacks and refreshing drinks.</p>
                </div>
                <div class="category-item">
                    <h3>Health & Organic</h3>
                    <p>Nutritious options for a healthier lifestyle.</p>
                </div>
            </div>
        </section>

        <section class="how-it-works">
            <h2>How It Works</h2>
            <ol>
                <li>1️⃣Click on Get started on the home page to create an account and login successfully.</li>
                <li>2️⃣ Browse & Select – Explore our wide range of food options.</li>
                <li>3️⃣ Place Your Order – Add items to your cart and check out securely.</li>
                <li>4️⃣ Enjoy Fast Delivery – We bring fresh food straight to your door.</li>
                <li>4️⃣ Savor the Taste – Enjoy every bite of quality goodness!</li>
            </ol>
        </section>

        <section class="reviews">
            <h2>Customer Reviews</h2>
            <blockquote>
                <p>⭐ “Best food delivery service! The meals are always fresh, and the delivery is super fast.” – Kayode Oluwaseyi</p>
                <p>⭐ “I love how easy it is to order snacks and drinks, Everything arrives in perfect condition!” – Olawale Ayokunmi</p>
            </blockquote>
        </section>

        <section id="contact" class="contact">
            <h2>Contact Us</h2>
            <p>📍 Address: 17, Saani Balogun Street, Abulegba Bus Stop</p>
            <p>📧 Email: <a href="mailto:oyestandard@gmail.com">oyestandard@gmail.com</a></p>
            <p>📞 Phone: <a href="tel:+2348101725111">08101725111</a> or <a href="tel:+2349076622163">09076622163</a></p>
            <p>📞For customer support:<a href="tel:+07026799337">Click here</a></p>
        </section>

        <section id="social" class="social-media">
             <h2>Follow Us</h2>
             <p class="follow-text">Stay connected for delicious updates!</p> <!-- New text -->
    <div class="social-links">
    </div>
       </section>

        <div class="social-links">
            <a href="https://www.instagram.com/oyesdelight?igsh=ZmU2Ynl0ejA3bGh6&utm_source=qr" class="social-icon"><i class="fab fa-instagram"></i></a>
            <a href="https://www.tiktok.com/@oyes.delight?_t=ZM-8v4JN872rZO&_r=1" class="social-icon"><i class="fab fa-tiktok"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-x"></i></a>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Oye's Delight. All rights reserved.</p>
    </footer>
    <script>
  if (!document.querySelector('.fa-font-awesome')) {
    document.write('<link rel="stylesheet" href="/local-path/font-awesome.css">');
  }
</script>
    <script src="script.js"></script>
</body>
</html>