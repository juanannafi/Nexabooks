<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/5b08efb6b7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/keranjang.css') }}">
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

            <main class="content px-4 py-2">
                <div class="container-fluid py-4">
                    <div class="container-fluid py-4">
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <div class="row">
                                    <div class="col-md-12 mb-2">
                                        @if ($keranjang->tanggal_pinjam)
                                            <strong>Tanggal Pinjam : {{ $keranjang->tanggal_pinjam }}</strong>
                                        @else
                                        <form action="{{ route('pinjam.keranjang', $keranjang->id) }}" method="POST">
                                            @csrf
                                            @method('POST')
                                            <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                            <input autocomplete="off" required type="date" class="form-control
                                                @error('tanggal_pinjam') is-invalid
                                                @enderror"id="tanggal_pinjam" name="tanggal_pinjam" value="{{ old('tanggal_pinjam') }}">
                                            <button type="submit" class="btn btn-primary mx-1" style="margin-top: 5px">Pinjam</button>
                                            @if (session('error'))
                                                <div>{{ session('error') }}</div>
                                            @endif
                                        </form>
                                        @endif
                                     </div>
                                     <strong class="float-right">Kode Pinjam : {{ $keranjang->kode_pinjam }}</strong>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card mb-4">
                                            <div class="card-header pb-0">
                                                <h6 style="text-align: center">Data Buku</h6>
                                            </div>
                                            <div class="card-body px-0 pt-0 pb-2">
                                                <div class="table-responsive p-0">
                                                    <table class="table align-items-center mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cover</th>
                                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>
                                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pengarang</th>
                                                                @if ($keranjang->status >= 2)
                                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tenggat</th>
                                                                @endif
                                                                @if ($keranjang->status == 3)
                                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pengembalian</th>
                                                                @endif
                                                                {{-- @if ($keranjang->status == 1)
                                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                                                @endif --}}
                                                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($keranjang->detail_peminjaman as $item)
                                                                <tr>
                                                                    <td>
                                                                        <p class="text-xs text-secondary mb-0 ps-3">{{ $loop->iteration }}</p>
                                                                    </td>

                                                                    <td>
                                                                        @if ($item->buku->image)
                                                                            <img src="{{ asset('storage/' . $item->buku->image) }}" alt="" class="rounded mb-0" style="height: 100px;">
                                                                        @else
                                                                            <img src="https://pngtree.com/freepng/no-image-vector-illustration-isolated_4979075.html" alt="" class="rounded" style="width: 150px;">
                                                                        @endif
                                                                    </td>

                                                                    <td>
                                                                        <p class="text-xs text-secondary mb-0 ps-3">{{ $item->buku->judul }}</p>
                                                                    </td>

                                                                    <td>
                                                                        <p class="text-xs text-secondary mb-0 ps-3">{{ $item->buku->pengarang }}</p>
                                                                    </td>

                                                                    @if ($keranjang->status >= 2)
                                                                        <td>
                                                                            <p class="text-xs text-secondary mb-0 ps-3">{{ $keranjang->tanggal_kembali }}</p>
                                                                        </td>
                                                                    @endif

                                                                    @if ($keranjang->status == 3)
                                                                        <td>
                                                                            <p class="text-xs text-secondary mb-0 ps-3">{{ $keranjang->tanggal_pengembalian }}</p>
                                                                        </td>
                                                                    @endif

                                                                    {{-- @if ($keranjang->status == 1)
                                                                        <td>
                                                                            @if (!$keranjang->tanggal_pinjam)
                                                                                <button id="deleteButton_" data-id="{{ $item->id }}" class="btn btn-danger">
                                                                                    <i class="fa fa-trash"></i>
                                                                                </button>
                                                                            @endif
                                                                        </td>
                                                                    @endif --}}

                                                                    <td>
                                                                        @if ($keranjang->status == 1)
                                                                            <p class="text-xs text-danger mb-0 ps-3">waiting</p>
                                                                        @elseif ($keranjang->status == 2)
                                                                            <p class="text-xs text-danger mb-0 ps-3">approve</p>
                                                                        @elseif ($keranjang->status == 3)
                                                                            <p class="text-xs text-danger mb-0 ps-3">done</p>
                                                                        @elseif ($keranjang->status == 4)
                                                                            <p class="text-xs text-danger mb-0 ps-3">finish</p>
                                                                        @elseif ($keranjang->status == 5)
                                                                            <p class="text-xs text-danger mb-0 ps-3">ditolak</p>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <button class="btn btn-sm btn-danger">Hapus Masal</button>                 -->
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>
    <script src="js/beranda.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
