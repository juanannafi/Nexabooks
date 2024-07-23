<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nexabooks ✨</title>
        <link rel="stylesheet" href="{{ asset('assets/css/contact.css') }}"/>
    </head>

    <body>
        <header>
            <div class="logo">
                <img src="{{ asset('assets/desain_user/Logo.svg') }}" alt="NexaBooks Logo">
            </div>
            <nav>
                <ul>
                    <li><a href="landing">Home</a></li>
                    <li><a href="about">About</a></li>
                    <li><a href="best">Best Book</a></li>
                    <li><a href="contact">Contact us</a></li>
                </ul>
            </nav>
            <div class="auth-buttons">
                <a href="signIn">
                    <button class="login">Log In</button>
                </a>
                <a href="/signUp">
                    <button class="signup">Sign Up</button>
                </a>
            </div>
        </header>
        <main>
            <section class="ready-section">
                <h2>Ready to Get Started?</h2>
            </section>
            <footer>
                <div class="footer-content">
                    <div class="footer-column">
                        <h3>Contact Us</h3>
                        <p>+11 435 677 453</p>
                        <p>nexabooks@gmail.com</p>
                        <p>94 Road Pekapuran Street</p>
                        <p>West Java, Indonesia</p>
                    </div>
                    <div class="footer-column">
                        <h3>Legal</h3>
                        <ul>
                            <p><li><a href="#">Privacy Policy</a></li></p>
                            <p><li><a href="#">Licensing</a></li></p>
                            <p><li><a href="#">Terms</a></li></p>
                        </ul>
                    </div>
                    <div class="footer-column">
                        <h3>Support</h3>
                        <ul>
                            <p><li><a href="#">Help Center</a></li></p>
                            <p><li><a href="#">FAQs</a></li></p>
                            <p><li><a href="#">Contact Us</a></li></p>
                            <p><li><a href="#">Services</a></li></p>
                        </ul>
                    </div>
                </div>
                <div class="footer-logo">
                    <img src="{{ asset('assets/desain_user/Logo.svg') }}" alt="NexaBooks Logo">
                </div>
            </footer>
        </main>
    </body>
</html>
