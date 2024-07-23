<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(){
        return view('laporan.laporan');
    }

    public function generatePDF(){
        $data_peminjaman = Peminjaman::selectRaw('peminjaman.id, users.name as nama_peminjam, bukus.judul, tanggal_pinjam, tanggal_pengembalian, status')
        -> join('bukus', 'bukus.id', '=', 'buku_id' )
        -> join('users', 'users.id', '=', 'user_id')->get();
        $data = [
            'data_peminjaman' => $data_peminjaman,
        ];

        // Tampilkan laporan PDF
        $pdf = Pdf::loadView('layout.pdf', $data);
        return $pdf->download('laporan_peminjaman.pdf');
    }

    // public function apiLaporan(){
    //     $dataPerpustakaan = Peminjaman::selectRaw('peminjaman.id, users.name as nama_peminjam, buku.judul, tanggal_pinjam, tanggal_pengembalian, status')
    //         ->join('bukus', 'bukus.id', '=', 'buku_id')
    //         ->join('users', 'users.id', '=', 'user_id');
    //     return datatables()->of($dataPerpustakaan)->toJson();
    // }
}
