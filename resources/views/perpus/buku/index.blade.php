@extends('main.main')
@section('title', 'Data Buku')
@section('content')
{{-- isi --}}
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                    <h6>Daftar Buku</h6>
                    {{-- search --}}
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="form-group mb-0">
                            <form method="get" action="/search" class="d-flex">
                                <div class="input-group">
                                    <span class="input-group-text text-body" style="height: 42px"><i class="fas fa-search" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" name="search" placeholder="Type here..." value="{{ request()->input('search') ? request()->input('search') : '' }}" style="height: 42px">
                                    <button type="submit" class="btn btn-primary" style="height: 42px">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <a class="btn btn-outline-primary btn-md" href="{{ url('/show/createBuku') }}">Tambah buku</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0" style="overflow-x: auto;">

                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">Judul</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">Cover</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">Pengarang</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">Stok</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">Tahun Terbit</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">Kategori</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">Sinopsis</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-9">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($bukus as $buku)
                                    <tr>

                                        <td>
                                            <p class="text-xs text-secondary mb-0 ps-3">{{ $buku->judul }}</p>
                                        </td>

                                        <td>
                                            @if ($buku->image)
                                                <img src="{{ asset('storage/' . $buku->image) }}" alt="Cover Buku" class="rounded mb-0" style="height: 95px; width: 70px; object-fit: cover;">
                                            @else
                                                <img src="https://example.com/no-image.png" alt="No Image" class="rounded" style="height: 80px; width: 80px; object-fit: cover;">
                                            @endif
                                        </td>

                                        <td>
                                            <p class="text-xs text-secondary mb-0 ps-3">{{ $buku->pengarang }}</p>
                                        </td>

                                        <td>
                                            <p class="text-xs text-secondary mb-0 ps-3">{{ $buku->stok }}</p>
                                        </td>

                                        <td>
                                            <p class="text-xs text-secondary mb-0 ps-3">{{ $buku->tahun_terbit }}</p>
                                        </td>

                                        <td>
                                            <p class="text-xs text-secondary mb-0 ps-3">
                                                @if ($buku->kategori_bukus)
                                                    {{ $buku->kategori_bukus->nama_kategori }}
                                                @else
                                                    <span class="text-danger">Tidak Tersedia</span>
                                                @endif
                                            </p>
                                        </td>

                                        <td>
                                            <p class="text-xs text-secondary mb-0 ps-3">
                                                <?php
                                                $sinopsisWords = str_word_count($buku->deskripsi, 1);
                                                $trimmedSinopsis = implode(' ', array_slice($sinopsisWords, 0, 2));
                                                echo $trimmedSinopsis;
                                                if(count($sinopsisWords) > 2) echo '...';
                                            ?>
                                            </p>
                                        </td>


                                        <td style="display: flex; margin-top: 38px">
                                            <a href="/update/{{ $buku->id }}" class="btn btn-success mx-1 btn-md">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('buku.delete', $buku->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-md">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>

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
</div>
@endsection
