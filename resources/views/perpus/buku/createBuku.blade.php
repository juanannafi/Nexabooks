@extends('main.main')
@section('title', 'Input Data Buku')
@section('content')
{{-- isi --}}
<div class="container-fluid py-4" style="margin-top: 33px">
    <form action="{{ route('buku.create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input autocomplete="off" required type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}">
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="image" class="form-label" style="margin-top: 20px">Cover</label>
                        <input autocomplete="off" required type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image') }}">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="pengarang" class="form-label" style="margin-top: 20px">Pengarang</label>
                        <input autocomplete="off" required type="text" class="form-control @error('pengarang') is-invalid @enderror" id="pengarang" name="pengarang" value="{{ old('pengarang') }}">
                        @error('pengarang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="stok" class="form-label" style="margin-top: 20px">Stok</label>
                        <input autocomplete="off" required type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{ old('stok') }}">
                        @error('stok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                        <input autocomplete="off" required type="date" class="form-control @error('tahun_terbit') is-invalid @enderror" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit') }}">
                        @error('tahun_terbit')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="kategori_bukus_id" class="form-label" style="margin-top: 20px">Kategori</label>
                        <select name="kategori_bukus_id" class="form-select" aria-label="Default select example">
                            <option>-Pilih Kategori Buku-</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori_bukus_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="deskripsi" class="form-label" style="margin-top: 20px">Sinopsis</label>
                        <textarea autocomplete="off" required class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="6">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer" style="margin-top: 15px">
            <a class="btn bg-gradient-danger" href="{{ url('/perpus') }}">Cancel</a>
            <button type="submit" class="btn bg-gradient-success ms-3">Save</button>
        </div>
    </form>

</div>
@endsection
