<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nexabooks ✨</title>
    <link rel="stylesheet" href="{{ asset('assets/css/best.css') }}"/>
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
    <main>
        <section class="best-book-section">
            <h1>Our <span style="color: #FFAB45;"> Best </span> Book</h1>
            <p>Find a list of the best books that are most often read online or borrowed offline every month. Discover new book titles to add to your reading list.</p>
            <div class="books">
                <div class="book">
                    <img src="{{ asset('assets/desain_user/Almond.png') }}" alt="Almond">
                    <h2>Almond</h2>
                    <p>Sohn Won-Pyung</p>
                    <p style="text-align: start; margin-left: 12px;">2019</p>
                    <p style="text-align: start; margin-left: 10px;">⭐ 5.0</p>
                </div>
                <div class="book">
                    <img src="{{ asset('assets/desain_user/SenjaDiAlaska.png') }}" alt="Senja di Alaska">
                    <h2>Senja di Alaska</h2>
                    <p style="text-align: start; margin-left: 12px;">AbelSel25</p>
                    <p style="text-align: start; margin-left: 12px;">2023</p>
                    <p style="text-align: start; margin-left: 10px;">⭐ 5.0</p>
                </div>
                <div class="book">
                    <img src="{{ asset('assets/desain_user/Dune.png') }}" alt="Dune">
                    <h2>Dune</h2>
                    <p style="text-align: start; margin-left: 12px;">Frank Herbert</p>
                    <p style="text-align: start; margin-left: 12px;">1965</p>
                    <p style="text-align: start; margin-left: 10px;">⭐ 5.0</p>
                </div>
                <div class="book">
                    <img src="{{ asset('assets/desain_user/1cmYou&Me.png') }}" alt="1cm Between You and Me">
                    <h2>1cm You & Me</h2>
                    <p style="text-align: start; margin-left: 12px;">Kim Eun Ju</p>
                    <p style="text-align: start; margin-left: 12px;">2020</p>
                    <p style="text-align: start; margin-left: 10px;">⭐ 5.0</p>
                </div>
                <div class="book">
                    <img src="{{ asset('assets/desain_user/TelahPergi.png') }}" alt="Yang Telah Lama Pergi">
                    <h2>Telah Pergi</h2>
                    <p style="text-align: start; margin-left: 12px;">Tere Liye</p>
                    <p style="text-align: start; margin-left: 12px;">2023</p>
                    <p style="text-align: start; margin-left: 10px;">⭐ 5.0</p>
                </div>
            </div>
        </section>
    </main>
</body>
</html>

</html>
