<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Detail_peminjaman;
use App\Models\Kategori_buku;
use App\Models\Peminjaman;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserViewController extends Controller
{
    public function showBook(){
        $bukus = Buku::with('kategori_bukus')->get();
        $kategoris = Kategori_buku::all();

        return view('desain.index', compact('bukus', 'kategoris'));
    }

    public function searchbookuser(Request $request){
        $searchbookuser = $request->searchbookuser;
        $query = Buku::query();
        $query->whereAny(['judul', 'pengarang'], 'LIKE', "%$searchbookuser%");

        $bukus = $query->get();

        return view('desain.index', compact('bukus', 'searchbookuser'));
    }

    public function detailBook(Request $request, $id){
        $bukus = Buku::findOrFail($id);
        $kategoris = Kategori_buku::all();

        return view('desain.detail_buku', compact('bukus', 'kategoris'));
    }

    public function keranjang($id){
        $bukus = Buku::findOrFail($id);

        $peminjaman_lama = DB::table('peminjaman')
            ->join('detail_peminjaman', 'peminjaman.id', '=', 'detail_peminjaman.peminjaman_id')
            ->where('peminjam_id', auth()->user()->id)
            ->where('status', '!=', 3)
            ->get();

        // jumlah maksimal 3
        if ($peminjaman_lama->count() == 3) {
            return response()->json(['status' => 'error', 'message' => 'Peminjaman maksimal 3 buku']);

        } else {

            // peminjaman belum ada isinya
            if ($peminjaman_lama->count() == 0) {
                $peminjaman_baru = Peminjaman::create([
                    'kode_pinjam' => random_int(100000000, 999999999),
                    'peminjam_id' => auth()->user()->id,
                    'status' => 0
                ]);

                Detail_peminjaman::create([
                    'peminjaman_id' => $peminjaman_baru->id,
                    'buku_id' => $bukus->id
                ]);

                return response()->json(['status' => 'success', 'message' => 'Buku berhasil ditambahkan ke keranjang']);

            } else {
                // buku tidak boleh sama
                if ($peminjaman_lama[0]->buku_id == $bukus->id) {
                    return response()->json(['status' => 'error', 'message' => 'Maaf, buku tidak boleh sama']);

                } else {
                    Detail_peminjaman::create([
                        'peminjaman_id' => $peminjaman_lama[0]->peminjaman_id,
                        'buku_id' => $bukus->id
                    ]);

                    return response()->json(['status' => 'success', 'message' => 'Buku berhasil ditambahkan ke keranjang']);
                }
            }
        }
    }

    // public $count;
    // public function mount()
    // {
    //     $this->count = DB::table('peminjaman')
    //         ->join('detail_peminjaman', 'peminjaman.id', '=', 'detail_peminjaman.peminjaman_id')
    //         ->where('peminjam_id', auth()->user()->id)
    //         ->where('status', '!=', 3)
    //         ->count();
    //     dd($this->count);
    // }
    // public function tambahKeranjang()
    // {
    //     // $this->count += 1;
    // }
}
