@extends('main.main')
@section('title', 'Data Kategori')
@section('content')
{{-- isi --}}
<div class="container-fluid py-4">
    <div class="container-fluid py-4">
        @include('perpus.kategori.createKategori')
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h6>Daftar Kategori</h6>
                        {{-- search --}}
                        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                            <div class="form-group mb-0">
                                <form method="get" action="/searchkategori" class="d-flex">
                                    <div class="input-group">
                                        <span class="input-group-text text-body" style="height: 42px"><i class="fas fa-search" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="searchkategori" placeholder="Type here..." value="{{ request()->input('searchkategori') ? request()->input('searchkategori') : '' }}" style="height: 42px">
                                        <button type="submit" class="btn btn-primary" style="height: 42px">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <button type="button" class="btn btn-outline-primary btn-md" data-bs-toggle="modal" data-bs-target="#createKategori">Tambah Kategori</button>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <!-- <form action="{{ route('kategori_buku') }}" method="post" enctype="multipart/form-data"> -->
                            @csrf
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Kategori</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kategoris as $kategori)
                                        <tr>
                                            <td>
                                                <p class="text-xs text-secondary mb-0 ps-3">
                                                    {{ $kategori->id }}
                                                </p>
                                            </td>

                                            <td>
                                                <p class="text-xs text-secondary mb-0 ps-3">
                                                    {{ $kategori->nama_kategori }}</p>
                                            </td>

                                            <td class="d-flex">
                                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editKategori_{{ $kategori->id }}" data-book-id={{ $kategori->id }}>
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <form action="{{ route('kategori.delete', $kategori->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger mx-1">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                            </form>
                                                @include('perpus.kategori.updateKategori')
                                            </td>
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
@endsection
