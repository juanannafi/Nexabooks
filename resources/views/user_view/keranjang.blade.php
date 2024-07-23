@extends('main.main_userview')
@section('title', 'Nexabooks')
@section('content')
{{-- isi --}}
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
                                <h6>Data Buku</h6>
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
                                                @if ($keranjang->status == 1)
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                                @endif
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

                                                    @if ($keranjang->status == 1)
                                                        <td>
                                                            @if (!$keranjang->tanggal_pinjam)
                                                                <button id="deleteButton_" data-id="{{ $item->id }}" class="btn btn-danger">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            @endif
                                                        </td>
                                                    @endif

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
                {{-- @if (!$keranjang->tanggal_pinjam)
                    <button class="btn btn-sm btn-danger">Hapus Masal</button>
                @endif --}}

            </div>

        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <meta name="csrf-token" content="{{ csrf_token() }}">



        <script>
            $(document).ready(function() {
                $(document).on('click', '#deleteButton_', function() {
                    var bukuId = $(this).data('id');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        type: "DELETE",
                        url: "{{ url('/delete/keranjang/') }}/" + bukuId,

                        success: function(response) {

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
                                alert('wrrrjodis');
                            }

                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            $('#gagal').show().delay(3000).fadeOut();
                        }
                    });
                });

            });
        </script>

    @endsection
