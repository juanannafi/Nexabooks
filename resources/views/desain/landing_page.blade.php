<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexabooks ✨</title>
    <link rel="stylesheet" href="{{ asset('assets/css/landing.css') }}"/>
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
            <a href="/signIn">
                <button type="submit" class="login">Login</button>
            </a>
            <a href="/signUp">
                <button type="submit" class="signup">Sign Up</button>
            </a>
        </div>
    </header>
    <main id="landing">
        <div class="content">
            <h1>Connecting <br><span style="color: #B48E5E;">You to the World of</span> Books.</h1>
            <p id="welcome">Welcome to <strong>NexaBook!</strong> </p>
            <p style="margin-top: 3px;">The digital library platform designed to make it easy for you to find, read, and enjoy books from a wide range of genres and renowned authors.</p>
            <a href="/signIn">
                <button type="submit" class="get-started">Lets get started</button>
            </a>
        </div>
        <div class="image">
            <img src="{{ asset('assets/desain_user/Book.svg') }}" alt="Books">
        </div>
    </main>
</body>
</html>

</html>
