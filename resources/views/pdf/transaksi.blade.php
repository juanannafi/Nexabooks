<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Peminjaman</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            font-size: 12px;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        th:first-child, td:first-child {
            padding-left: 20px;
        }

        th:last-child, td:last-child {
            padding-right: 20px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .badge {
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .badge.bg-info {
            background-color: #17a2b8;
            color: #fff;
        }

        .badge.bg-warning {
            background-color: #ffc107;
            color: #212529;
        }

        .badge.bg-success {
            background-color: #28a745;
            color: #fff;
        }

        .badge.bg-danger {
            background-color: #dc3545;
            color: #fff;
        }

        .badge.bg-primary {
            background-color: #102C57;
            color: #fff;
        }
    </style>
</head>
<body>
    <h1>Data Peminjaman</h1>
    <hr>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Pinjam</th>
                <th>Judul</th>
                <th>Tanggal Pinjam</th>
                <th>Tenggat</th>
                <th>Tanggal Pengembalian</th>
                <th>Denda</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_peminjaman as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_pinjam }}</td>
                    <td>
                        <ul>
                            @foreach ($item->detail_peminjaman as $buku)
                                <li>{{ $buku->buku->judul }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $item->tanggal_pinjam }}</td>
                    <td>{{ $item->tanggal_kembali }}</td>
                    <td>{{ $item->tanggal_pengembalian }}</td>
                    <td>Rp. {{ $item->denda >= 0 ? number_format($item->denda) : '-' }}</td>
                    <td>
                        @if ($item->status == 1)
                            <span class="badge bg-info">Belum dipinjam</span>
                        @elseif ($item->status == 2)
                            <span class="badge bg-warning">Sedang dipinjam</span>
                        @elseif ($item->status == 3)
                            <span class="badge bg-success">Selesai dipinjam</span>
                        @elseif ($item->status == 5)
                            <span class="badge bg-primary">Ditolak</span>
                        @else
                            <span class="badge bg-danger">Denda</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
