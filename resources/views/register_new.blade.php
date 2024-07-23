<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexabooks ✨</title>
    <link rel="stylesheet" href="{{ asset('assets/css/sign.css') }}"/>
</head>

<body>
    <div class="container">
        <div class="welcome-section">
            <img src="{{ asset('assets/desain_user/Welcome.svg') }}" alt="NexaBooks Logo" style="scale: 75%; margin-top: 10%;">
        </div>
        <div class="signup-section">
            <h1>Create your new account</h1>
            <form role="form" method="POST" action="{{ route('register_user') }}">
                @csrf

                <label for="name">Username</label>
                <input type="text" id="name" name="name">

                <label for="email">Email</label>
                <input type="email" id="email" name="email">

                <label for="password">Password</label>
                <input type="password" id="password" name="password">

                <button type="submit">Sign Up</button>
                <div class="login">
                    <p>Already have an account? <a href="{{ route('login') }}" style="font-weight: bolder;">Login</a></p>
                </div>
            </form>
            </div>
    </div>

</body>
</html>
