<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Planning and Ticketing</title>
    <link rel="stylesheet" href="landingScreen.css">
    <style>
        .igm{
            color: black;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <div class="logo">EventPlanner</div>
            <ul class="nav-links">
                <li><a href="#hero">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#events">Events</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>
    <section class="hero" id="hero">
        <div class="hero-content">
            <h1 class="fade-in">Plan Your Events with Ease</h1>
            <p class="slide-in">Discover and book tickets for amazing events.</p>
            <button class="cta-button" id="get-started" onclick="showModal()">Get Started</button>
        </div>
        <div id="roleModal" class="modal">
            <div class="modal-content">
                <p>Select your role:</p>
                <button id="adminBtn" onclick="navigateToAdmin()">Admin</button>
                <button id="userBtn" onclick="navigateToUser()">User</button>
            </div>
        </div>
    </section>
    <div class="ok">
        <section id="about">
            <div class="bright-gradient">
                <h2>About Us</h2>
                <p>We make event planning and ticketing simple and convenient.</p>
            </div>
        </section>
        <section id="events">
            <div class="bright-gradient">
                <h2>Upcoming Events</h2>
                <p>Stay tuned for our upcoming events.</p>
            </div>
        </section>
        <section id="contact">
            <div class="bright-gradient">
                <h2>Contact Us</h2>
                <p>Feel free to reach out to us for any inquiries.</p>
                <p>theumair3191@gmail.com</p>
                <p>+923008342787</p>
                <a href="https://www.instagram.com/umair_btw/" class="igm">Instagram</a>
            </div>
        </section>
    </div>
    <footer>
        <p>&copy; 2024 EventPlanner. All rights reserved.</p>
    </footer>
    <script src="landingScreen.js"></script>
</body>

</html>
