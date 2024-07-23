<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexabooks ✨</title>
    <link rel="stylesheet" href="{{ asset('assets/css/about.css') }}"/>
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
                <button class="login">Login</button>
            </a>
            <a href="/signUp">
                <button class="signup">Sign Up</button>
            </a>
        </div>
    </header>

    <div class="container">
        <div id="content">
            <h1 style="color: #FFAB45;">About<span style="color: #B48E5E;"> Us</span></h1>
        </div>
    </div>

    <footer>
        <ul>
            <li>
                NexaBooks is a comprehensive online platform designed for book lovers who want to borrow and read books conveniently. Our digital library offers a vast collection of Books across various genres, ensuring there's something for everyone. Whether you're a fan of fiction, non-fiction, or seeking educational materials, NexaBooks provides easy access to thousands of titles.
            </li>
            <li>
                <img src="{{ asset('assets/desain_user/AboutIcon.svg') }}" alt="About">
            </li>
        </ul>
    </footer>

</body>
</html>

</html>
