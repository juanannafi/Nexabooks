@extends('main.main_userview')
@section('title', 'Nexabooks')
@section('content')
{{-- isi --}}
<div class="container-fluid py-4">
    <div class="container-fluid py-4">
        <div id="message" class="alert" style="display:none;"></div>
        <div class="row">
            <div class="col-3">
                <img src="{{ asset('storage/' . $bukus->image) }}" class="img-fluid border-radius-lg h-auto ">
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

                                        if ($wordCount % 8 == 0) {
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
@endsection
