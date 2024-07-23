@extends('main.main_userview')
@section('title', 'Nexabooks')
@section('content')
{{-- isi --}}
<style>
    .card img {
        width: 100%;
        height: auto;
        object-fit: contain;
    }

    .card-body {
        display: flex;
        flex-direction: column;
    }

    .card-body .card-title {
        margin-bottom: auto;
    }
</style>

<div class="container-fluid py-4">
    <div class="container-fluid py-4">
        <div class="row">
            @foreach ($bukus as $buku)
                <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                    <div class="card h-100">
                        <a href="/detailBuku/{{ $buku->id }}">
                            <div class="card-header p-0 mx-3 mt-3 position-relative z-index-1">
                                <img src="{{ asset('storage/' . $buku->image) }}" class="img-fluid border-radius-lg" alt="{{ $buku->judul }}">
                            </div>
                            <div class="card-body d-flex flex-column">
                                <a href="/detailBuku/{{ $buku->id }}" class="card-title h5 d-block text-darker">{{ $buku->judul }}</a>
                                <span class="text-gradient text-primary text-uppercase text-xs font-weight-bold my-2">{{ $buku->pengarang }}</span>
                                <?php
                                    $deskripsiWords = str_word_count($buku->deskripsi, 1);
                                    $deskripsiTrimmed = implode(' ', array_slice($deskripsiWords, 0, 6));
                                    echo "<p class='card-description mb-4 flex-grow-1'>$deskripsiTrimmed";
                                    if (count($deskripsiWords) > 6) {
                                        echo "...";
                                    }
                                    echo "</p>";
                                ?>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
