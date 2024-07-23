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
                        <a href="{{ route('logout') }}" class="sidebar-link" style="font-size: large;">
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

                {{-- keranjang --}}
                <div class="ms-auto">
                    <li class="nav-item d-flex align-items-center">
                        <a href="/show/keranjang" class="nav-link">Keranjang
                            <span class="badge text-bg-primary">{{ auth()->user()->detail_peminjaman() }}</span></a>
                    </li>
                </div>

                {{-- nama peminjam --}}
                <li class="nav-item d-flex align-items-center">
                    <i class="fa fa-user fa-2x me-sm-1"></i>
                    <div class="nav-link text-body d-flex flex-column">
                        <span class="ms-1 font-weight-bold">{{ auth()->user()->name }}</span>
                        <span class="ms-1 pt-0">{{ auth()->user()->email }}</span>
                    </div>
                </li>
            </nav>
            </nav>

            <main class="content px-4 py-2">
                <div class="container-fluid py-4">
                    <div class="container-fluid py-4">
                        <span class="judul" style="color: #B48E5E;">
                            <p style="margin-left: 9px;">Detail Buku</p>
                        </span>
                        <div id="message" class="alert" style="display:none;"></div>
                        <div class="row">
                            <div class="col-3">
                                <img src="{{ asset('storage/' . $bukus->image) }}" class="img-fluid border-radius-lg h-auto">
                                <button id="keranjang-button" data-id="{{ $bukus->id }}" class="btn btn-success btn-md" style="margin-top: 10px">
                                    <i class="ni ni-cart text-size-lg relative top-3.5"></i> <span>Keranjang</span>
                                </button>
                            </div>
                            <div class="col-8">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Judul</th>
                                            <th>:</th>
                                            <th>{{ $bukus->judul }}</th>
                                        </tr>

                                        <tr>
                                            <th>Pengarang</th>
                                            <th>:</th>
                                            <th>{{ $bukus->pengarang }}</th>
                                        </tr>

                                        <tr>
                                            <th>Kategori</th>
                                            <th>:</th>
                                            <th>{{ $bukus->kategori_bukus->nama_kategori }}</th>
                                        </tr>

                                        <tr>
                                            <th>Stok</th>
                                            <th>:</th>
                                            <th>{{ $bukus->stok }}</th>
                                        </tr>

                                        <tr>
                                            <th>Sinopsis</th>
                                            <th>:</th>
                                            <th class="sinopsis">
                                                <?php
                                                    $deskripsiWords = explode(' ', $bukus->deskripsi);
                                                    $deskripsiTrimmed = '';
                                                    $wordCount = 0;

                                                    foreach ($deskripsiWords as $word) {
                                                        $deskripsiTrimmed .= $word . ' ';
                                                        $wordCount++;

                                                        if ($wordCount % 6 == 0) {
                                                            $deskripsiTrimmed .= '<br>';
                                                        }

                                                        if ($wordCount == 80) {
                                                            $deskripsiTrimmed .= '...';
                                                            break;
                                                        }
                                                    }

                                                    echo $deskripsiTrimmed;
                                                ?>
                                            </th>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>
    <script src="{{ asset('assets/js/beranda.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#keranjang-button').on('click', function() {
            var bukuId = $(this).data('id');

            $.ajax({
                type: "POST",
                url: '/keranjang/' + bukuId,
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    // Display a success message
                    //$('#sukses').show().delay(3000).fadeOut();
                    if (response.status === 'success') {
                        // Display a success message
                        $('#message').html(
                            `<div class="alert alert-success" role="alert">
                                ${response.message}</div>`)
                                .show().delay(3000).fadeOut();
                    } else if (response.status === 'error') {
                        // Display an error message
                        $('#message').html(
                                `<div class="alert alert-danger" role="alert">
                                            ${response.message}</div>`)
                            .show().delay(3000).fadeOut();
                    } else {
                        alert('gagal');
                    }

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    $('#gagal').show().delay(3000).fadeOut();
                }
            });
        });
    });
</script>
</body>
</html>
