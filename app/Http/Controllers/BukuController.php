<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori_buku;
use Exception;
use Illuminate\Http\Request;


class BukuController extends Controller
{
    public function buku(){
        $bukus = Buku::with('kategori_bukus')->get();
        $kategoris = Kategori_buku::all();

        return view('perpus.buku.index', compact('bukus', 'kategoris'));
    }

    public function search(Request $request){
        $search = $request->search;
        $query = Buku::query();
        $query->whereAny(['judul', 'pengarang', 'stok', 'tahun_terbit', 'deskripsi'], 'LIKE', "%$search%");

        $query->orWhereHas('kategori_bukus', function($query) use ($search){
            $query->whereAny(['nama_kategori'], 'LIKE', "%$search%");
        });

        $bukus = $query->get();

        return view('perpus.buku.index', compact('bukus', 'search'));
    }

    public function createBuku(Request $request){
        try {
            $buku = $request->validate([
                'judul' => 'required|string',
                'pengarang' => 'required|string',
                'stok' => 'required|integer',
                'tahun_terbit' => 'required',
                'deskripsi' => 'required',
                'kategori_bukus_id' => 'required',
            ]);

            if ($request->file('image')) {
                $buku['image'] = $request->file('image')->store('cover-images', 'public');
            };

            $buku = Buku::create($buku);

            return redirect()->route('daftar_buku')->with('success', 'Buku berhasil ditambahkan');

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Buku gagal ditambahkan' . $e->getMessage()
            ], 500);
        }
    }

    public function showCreate(){
        $kategoris = Kategori_buku::all();

        return view('perpus.buku.createBuku',  compact('kategoris'));
    }

    public function showEdit($id){
        $buku = Buku::find($id);
        $kategoris = Kategori_buku::all();

        return view('perpus.buku.updateBuku', compact('buku', 'kategoris'));
    }

    public function updateBuku(Request $request, $id){
        try {
            $buku = $request->validate([
                'judul' => 'required|string',
                'pengarang' => 'required|string',
                'stok' => 'required|integer',
                'tahun_terbit' => 'required',
                'deskripsi' => 'required',
                'kategori_bukus_id' => 'required',
            ]);

            if ($request->file('image')) {
                $buku['image'] = $request->file('image')->store('cover-images', 'public');
            };

            $find = Buku::findOrFail($id);
            $find->update($buku);

            return redirect()->route('daftar_buku')->with('success', 'Buku berhasil diperbarui');

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Buku gagal diperbarui' . $e->getMessage()
            ], 500);
        }
    }

    public function deleteBuku($id){
        try {
            $buku = Buku::destroy($id);

            if ($buku) {
                return redirect()->route('daftar_buku')->with('success', 'Buku berhasil dihapus');
            } else {
                throw new Exception("Tidak ada buku dengan id $id");
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
