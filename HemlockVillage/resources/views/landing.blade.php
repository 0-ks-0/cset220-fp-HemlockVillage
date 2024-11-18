<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" href="css/home.css">
    
</head>
<body>

    <header class="header">
        <a href="#contact" class="contact-us">Contact Us</a>
        <a href="#services" class="services">Services</a>
        <div class="logo-container">
            <img class="logo" src="{{ asset('images/LOGO.png') }}" alt="logo">
        </div>
        <div class="auth-buttons">
            <a href="/login">Log In</a>
            <a href="/signup">Sign Up</a>
        </div>
    </header>

    <section id="home" class="section">
        <div class="home-content">
            <h1>Welcome to Hemlock Village!</h1>
            <p>Scroll down to explore more.</p>
        </div>
    </section>

    <section id="services" class="section">
        <h2>Our Services</h2>
        <div class="service-item">
            <h3>Service 1</h3>
            <p>Description of service 1.</p>
        </div>
        <div class="service-item">
            <h3>Service 2</h3>
            <p>Description of service 2.</p>
        </div>
        <div class="service-item">
            <h3>Service 3</h3>
            <p>Description of service 3.</p>
        </div>
    </section>

    <section id="contact" class="section">
        <h2>Contact Us</h2>
        <div class="form-container">
            <form>
                <input type="text" placeholder="Your Name" required><br><br>
                <input type="email" placeholder="Your Email" required><br><br>
                <textarea placeholder="Your Message" required></textarea><br><br>
                <button type="submit">Send Message</button>
            </form>
            <h1>Or contact us through:</h1>
            <p>phone number: (888) 888-8888</p>
            <p>email: hemlockvillage@email.com</p>
        </div>
    </section>

    <section id="footer">

    </section>

</body>
</html>
