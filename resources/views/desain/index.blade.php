<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/5b08efb6b7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/beranda.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Nexabooks✨</title>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <aside id="sidebar">
            <div class="sidebar" style="width: 240px;">
                <div class="sidebar-logo" style="margin-top: 5%;">
                    <a href="#">Nexabooks✨</a>
                </div>

                <!-- sidebar navigation -->
                <ul class="sidebar-nav">
                    <li class="sidebar-item">
                        <a href="{{ route('userview') }}" class="sidebar-link" style="font-size: large;">
                            <i class="fa-solid fa-house pe-1"></i>
                            Beranda
                        </a>
                    </li>
                    {{-- <li class="sidebar-item">
                        <a href="kategori.html" class="sidebar-link" style="font-size: large;">
                            <i class="fa-solid fa-shapes pe-2"></i>
                            Kategori
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link" style="font-size: large;">
                            <i class="fa-solid fa-book-bookmark pe-2"></i>
                            Koleksi
                        </a>
                    </li> --}}
                    <li class="sidebar-item">
                        <a href="/show/keranjang" class="sidebar-link" style="font-size: large;">
                            <i class="fa-solid fa-cart-shopping pe-1"></i>
                            Peminjaman
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="/logout" class="sidebar-link" style="font-size: large;">
                            <i class="fa-solid fa-right-from-bracket fa-flip-horizontal me-1"></i>
                            Logout
                        </a>
                    </li>
                </ul>

            </div>
        </aside>

        <!-- Main Content -->
        <div class="main">
            <nav class="navbar bg-body-tertiary navbar-expand px-3 border-bottom">
                <!-- button for sidebar toggle -->
                <button class="btn btn-brown" type="button" style="color: #B48E5E;">
                    <i class="fa-solid fa-bars"></i>
                </button>
                {{-- search --}}
                <div class="ms-auto">
                    <div class="form-group">
                        <form method="get" action="/searchbookuser" class="d-flex">
                            <div class="input-group" style="border: 1px solid #B48E5E; border-radius: 10px;">
                                <span class="input-group-text text-body" style="border: none; border-radius: 10px; height: 42px;">
                                    <i class="fa-solid fa-magnifying-glass" style="color: #B48E5E;"></i>
                                </span>
                                <input class="form-control me-2" style="width: 250px; border: none;" type="text" style="width: 250px; color: #B48E5E; opacity: 0.5; border: none;" name="searchbookuser" placeholder="Search" value="{{ request()->input('searchbookuser') ? request()->input('searchbookuser') : '' }}" style="height: 42px">
                            </div>
                        </form>
                    </div>
                </div>
                <li class="nav-item d-flex align-items-center">
                    <a href="/show/keranjang" class="nav-link">Keranjang
                        <span class="badge text-bg-primary">{{ auth()->user()->detail_peminjaman() }}</span></a>
                </li>

                {{-- nama peminjam --}}
                <li class="nav-item d-flex align-items-center">
                    <i class="fa fa-user fa-2x me-sm-1"></i>
                    <div class="nav-link text-body d-flex flex-column">
                        <span class="ms-1 font-weight-bold">{{ auth()->user()->name }}</span>
                        <span class="ms-1 pt-0">{{ auth()->user()->email }}</span>
                    </div>
                </li>
            </nav>

            <main class="content px-4 py-2">
                <div class="container-fluid p-1">
                    <div id="carousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                          <button type="button" data-bs-target="#carousel1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                          <button type="button" data-bs-target="#carousel2" data-bs-slide-to="1" aria-label="Slide 2"></button>
                          <button type="button" data-bs-target="#carousel3" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img src="{{ asset('assets/desain_user/crsl1.png') }}" class="d-block w-95" alt="promo-1">
                          </div>
                          <div class="carousel-item">
                            <img src="{{ asset('assets/desain_user/csrl2.png') }}" class="d-block w-95" alt="promo-2">
                          </div>
                          <div class="carousel-item">
                            <img src="{{ asset('assets/desain_user/crsl3.png') }}" class="d-block w-95" alt="promo-3">
                          </div>
                        </div>
                    </div>

                    <div class="judul py-2">
                        <p>Daftar Buku</p>
                    </div>

                    <div class="container-fluid">
                        <div class="row">
                            @foreach ($bukus as $buku)
                                <div class="card mb-3 mx-2" style="width: 14rem; border-color: #B48E5E;">
                                    <a href="/detailBuku/{{ $buku->id }}" style="text-decoration: none;">
                                        <img src="{{ asset('storage/' . $buku->image) }}" class="card-img-top" style="margin-top: 10px; height: 300px;" alt="you&me">
                                        <div class="card-body body p-2">
                                            <h5 class="card-title mb-1">{{ $buku->judul }}</h5>
                                            <p class="card-text mb-1">{{ $buku->pengarang }}</p>
                                            <p class="card-text">{{ $buku->tahun_terbit }}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="{{ asset('assets/js/beranda.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
