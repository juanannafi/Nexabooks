<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Detail_peminjaman;
use App\Models\Peminjaman;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TransaksiController extends Controller
{
    public function index(){
        $peminjaman = Peminjaman::latest()->where('status', '!=', 0)->get();
        $users = User::all();

        return view('transaksi.index', compact('peminjaman', 'users'));
    }

    public function belumDipinjam(){
        $peminjaman = Peminjaman::latest()->where('status', 1)->get();
        $users = User::all();

        return view('transaksi.index', compact('peminjaman', 'users'));
    }

    public function sedangDipinjam(){
        $peminjaman = Peminjaman::latest()->where('status', 2)->get();
        $users = User::all();

        return view('transaksi.index', compact('peminjaman', 'users'));
    }

    public function selesaiDipinjam(){
        $peminjaman = Peminjaman::latest()->where('status', 3)->get();
        $users = User::all();

        return view('transaksi.index', compact('peminjaman', 'users'));
    }

    public function denda(){
        $peminjaman = Peminjaman::latest()->where('status', 4)->get();
        $users = User::all();

        return view('transaksi.index', compact('peminjaman', 'users'));
    }

    public function tolakPeminjaman(){
        $peminjaman = Peminjaman::latest()->where('status', 5)->get();
        $users = User::all();

        return view('transaksi.index', compact('peminjaman', 'users'));
    }

    public function pinjam(Peminjaman $id){
        $id->update([
            'petugas_pinjam' => auth()->user()->id,
            'status' => 2
        ]);
        return redirect()->route('transaksi.sedang')->with('success', 'Buku berhasil dipinjam');
    }

    public function tolak(Peminjaman $id){
        $id->update([
            'petugas_pinjam' =>auth()->user()->id,
            'status' => 5
        ]);

        return redirect()->back()->with('Success', 'Peminjaman ditolak');
    }

    public function kembali(Peminjaman $id){
        $data = [
            'status' => 3,
            'petugas_kembali' => auth()->user()->id,
            'tanggal_pengembalian' => today(),
            'denda' => 0
        ];

        if (Carbon::create($id->tanggal_kembali)->lessThan(today())) {
            $denda = Carbon::create($id->tanggal_kembali)->diffInDays(today());
            $denda *= 10000;
            $data['denda'] = $denda;
            $data['status'] = 4;
        }

        $id->update($data);

        return redirect()->route('transaksi.selesai')->with('success', 'Buku berhasil dikembalikan');
    }

    public function cetak(Request $request){
        $data_peminjaman = new Peminjaman;

        $data_peminjaman = $data_peminjaman->get();
        if ($request ->get('export') == 'pdf'){
            $pdf = PDF::loadView('pdf.transaksi', ['data_peminjaman' => $data_peminjaman]);
            return $pdf->stream('Data Peminjaman.pdf');
        }

        return view('transaksi.index', compact('peminjaman', 'users'));
    }

    public function cetakForm(){
        return view('transaksi.transaksi_form');
    }

    public function cetakTransaksiTanggal(Request $request, $tglawal, $tglakhir){
        // dd("Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir);
        $cetakPertanggal = new Peminjaman;
        $cetakPertanggal = $cetakPertanggal->whereBetween('tanggal_pinjam', [$tglawal, $tglakhir])->latest()->get();
        if ($request ->get('export') == 'pdf'){
            $pdfTanggal = PDF::loadView('transaksi.transaksi-pertanggal', ['cetakPertanggal' => $cetakPertanggal]);
            return $pdfTanggal->stream('Data Peminjaman Pertanggal.pdf');
        }
        return view('transaksi.transaksi-pertanggal', compact('cetakPertanggal'));
    }
}
