@extends('main.main')
@section('title', 'Transaksi')
@section('content')
{{-- isi --}}
<div class="container-fluid py-4">
    <div class="container-fluid py-4">
        {{-- <h2>Daftar Transaksi</h2> --}}
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h3>Print Data Transaksi</h3>
                    </div>
                    <div class="card-body px-3 pt-0 pb-2">
                        <form action="#" method="GET">
                            <div class="mb-3">
                                <label for="tglawal" class="form-label">Tanggal Awal</label>
                                <input type="date" name="tglawal" id="tglawal" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="tglakhir" class="form-label">Tanggal Akhir</label>
                                <input type="date" name="tglakhir" id="tglakhir" class="form-control">
                            </div>
                            <div class="mb-3">
                                <a href="cetak_form" onclick="this.href='/cetak_pertanggal/'+document.getElementById('tglawal').value +
                                '/' + document.getElementById('tglakhir').value " target="_blank" class="btn btn-primary col-md-12">Cetak Pertanggal <i class="fas fa-print"></i></a>
                                {{-- <button type="submit" class="btn btn-primary col-md-12">Cetak Laporan  <i class="fas fa-print"></i></button> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

