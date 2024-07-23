@extends('main.main')
@section('title', 'Transaksi')
@section('content')
{{-- isi --}}
<div class="container-fluid py-4">
    <div class="container-fluid py-4">
        <h2>Daftar Transaksi</h2>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <a href="{{ route('transaksi.semua') }}?export=pdf" class="btn btn-outline-primary btn-md">Cetak Laporan</a>
                        <a href="{{ route('cetak_form') }}?export=pdf" class="btn btn-outline-primary btn-md">Cetak Pertanggal</a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <!-- <form action="{{ route('daftar_buku') }}" method="post" enctype="multipart/form-data">                                                                                                                            @csrf -->
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kode Pinjam</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Judul</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Pinjam</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tenggat</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Pengembalian</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Denda</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                        @if (auth()->user()->role_status === 'petugas')
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                        @endif
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($peminjaman as $item)
                                        <tr>
                                            <td>
                                                <p class="text-xs text-secondary mb-0 ps-3">{{ $loop->iteration }}</p>
                                            </td>

                                            <td>
                                                <p class="text-xs text-secondary mb-0 ps-3">{{ $item->kode_pinjam }}</p>
                                            </td>

                                            <td>
                                                @foreach ($item->detail_peminjaman as $buku)
                                                    <li class="text-xs text-secondary mb-0 lis-3">{{ $buku->buku->judul }}</li>
                                                @endforeach
                                            </td>

                                            <td>
                                                <p class="text-xs text-secondary mb-0 ps-3">{{ $item->tanggal_pinjam }}
                                                </p>
                                            </td>

                                            <td>
                                                <p class="text-xs text-secondary mb-0 ps-3">{{ $item->tanggal_kembali }}</p>
                                            </td>

                                            <td>
                                                @if ($item->status != 5)
                                                    <p class="text-xs text-secondary mb-0 ps-3">{{ $item->tanggal_pengembalian }}</p>
                                                @endif
                                            </td>

                                            <td>
                                                <p class="text-xs text-secondary mb-0 ps-3">Rp. {{ $item->denda >= 0 ? number_format($item->denda) : '-' }}</p>
                                            </td>

                                            <td>
                                                @if ($item->status == 1)
                                                    <span class="badge bg-info">Pinjamkan</span>
                                                @elseif ($item->status == 2)
                                                    <span class="badge bg-warning">Dipinjam</span>
                                                @elseif ($item->status == 3)
                                                    <span class="badge bg-success">Selesai</span>
                                                @elseif ($item->status == 5)
                                                    <span class="badge bg-secondary">Ditolak</span>
                                                @else
                                                    <span class="badge bg-danger">Denda</span>
                                                @endif
                                            </td>

                                            @if (auth()->user()->role_status === 'petugas')
                                                <td>
                                                    @if ($item->status == 1)
                                                        <form action="{{ route('transaksi.pinjam', $item->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('POST')
                                                            <button type="submit" class="btn btn-warning mx-1">Pinjam</button>
                                                        </form>

                                                        <form action="{{ route('transaksi.tolak', $item->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('POST')
                                                            <button type="submit" class="btn btn-secondary mx-1">Tolak</button>
                                                        </form>

                                                    @elseif ($item->status == 2)
                                                        <form action="{{ route('transaksi.kembali', $item->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('POST')
                                                            <button type="submit" class="btn btn-danger mx-1">Kembali</button>
                                                        </form>
                                                    @else
                                                        {{-- <button type="submit" class="btn btn-success mx-1">Detail</button> --}}
                                                    @endif
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- </form> -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var buttons = document.querySelectorAll('#btn-status');
        var currentUrl = window.location.href;

        buttons.forEach(function(button) {
            if (currentUrl.includes(button.href)) {
                button.classList.remove('bg-gradient-primary');
                button.classList.add('bg-gradient-light');
            } else {
                button.classList.remove('bg-gradient-light');
                button.classList.add('bg-gradient-primary');
            }
        });
    });
</script>

@endsection
