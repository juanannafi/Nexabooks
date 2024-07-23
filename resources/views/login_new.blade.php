<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Nexabooks ✨</title>
        <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}"/>
    </head>

    <body>
        <div class="container">
            <div class="welcome-section">
                <img src="{{ asset('assets/desain_user/Welcome.svg') }}" alt="NexaBooks Logo" style="scale: 75%; margin-top: 10%;">
            </div>
            <div class="login-section">
                <h1>Login to your account</h1>
                <form role="form" method="POST" action="{{ route('login_user') }}">
                    @csrf

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <p>{{ $errors->first('email') }}</p>
                        </div>
                    @endif
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                        {{-- @error('email')
                            <div class="alert">{{ $message }}</div>
                        @enderror --}}

                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Password" value="{{ old('password') }}">
                        {{-- @error('password')
                            <div class="alert">{{ $message }}</div>
                        @enderror --}}

                        <div>
                            <button type="submit">Login</button>
                        </div>
                    <div class="signup">
                        <p>Didn't have an account? <a href="{{ route('regis') }}" style="font-weight: bolder;">Sign Up</a></p>
                    </div>
                </form>
                </div>
            </div>
    </body>
</html>
