@extends('main.main')
@section('title', 'Edit Data Buku')
@section('content')
{{-- isi --}}
<div class="container-fluid py-4">
    <form action="{{ route('buku.update', ['id' => $buku->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" id="editBookId" value="{{ $buku->id }}">
        <div class="modal-body container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input autocomplete="off" required type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $buku->judul) }}">
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="image" class="form-label" style="margin-top: 10px">Cover</label>
                        <input autocomplete="off" type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image', $buku->image) }}">
                        <img src="{{ asset('storage/' . $buku->image) }}" alt="Cover Buku" class="p-2 h-20 d-flex" style="width: 80px;">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="pengarang" class="form-label" style="margin-top: 10px">Pengarang</label>
                        <input autocomplete="off" required type="text" class="form-control @error('pengarang') is-invalid @enderror" id="pengarang" name="pengarang" value="{{ old('pengarang', $buku->pengarang) }}">
                        @error('pengarang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="stok" class="form-label" style="margin-top: 10px">Stok</label>
                        <input autocomplete="off" required type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" value="{{ old('stok', $buku->stok) }}">
                        @error('stok')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                        <input autocomplete="off" required type="date" class="form-control @error('tahun_terbit') is-invalid @enderror" id="tahun_terbit" name="tahun_terbit" value="{{ old('tahun_terbit', $buku->tahun_terbit) }}">
                        @error('tahun_terbit')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="kategori_bukus_id" class="form-label" style="margin-top: 10px">Kategori</label>
                        <select name="kategori_bukus_id" class="form-select" aria-label="Default select example">
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}"
                                    {{ $kategori->id == $buku->kategori_bukus_id ? 'selected' : '' }}>
                                    {{ $kategori->nama_kategori }}
                                </option>
                            @endforeach
                        </select>
                        @error('kategori_bukus_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        <label for="deskripsi" class="form-label" style="margin-top: 10px">Sinopsis</label>
                        <textarea autocomplete="off" required class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="6">{{ old('deskripsi', $buku->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a class="btn bg-gradient-danger" href="{{ url('/perpus') }}">Cancel</a>
            <button type="submit" class="btn bg-gradient-success ms-3">Save</button>
        </div>
    </form>


</div>
@endsection
