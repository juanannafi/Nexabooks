<?php

namespace App\Http\Controllers;

use App\Models\kategori_buku;
use Exception;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function kategori(){
        $kategoris = Kategori_buku::all();

        return view('perpus.kategori.index', compact('kategoris'));
    }

    public function searchkategori(Request $request){
        $searchkategori = $request->searchkategori;
        $query = kategori_buku::query();
        $query->whereAny(['nama_kategori'], 'LIKE', "%$searchkategori%");

        $kategoris = $query->get();

        return view('perpus.kategori.index', compact('kategoris', 'searchkategori'));
    }

    public function createKategori(Request $request){
        try {
            $kategori = $request->validate([
                'nama_kategori' => 'required|string',
            ]);

            $kategori = Kategori_buku::create($kategori);

            return redirect()->route('kategori_buku')->with('success', 'Kategori berhasil ditambahkan');

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Kategori gagal ditambahkan' . $e->getMessage()
            ], 500);
        }
    }

    public function showKategori(){
        return Kategori_buku::all();
    }

    public function showKategoriById($id){
        return Kategori_buku::find($id);
    }

    public function updateKategori(Request $request, $id){
        try {
            $kategori = $request->validate([
                'nama_kategori' => 'required|string',
            ]);

            $find = Kategori_buku::findOrFail($id);
            $find->update($kategori);

            return redirect()->route('kategori_buku')->with('success', 'Kategori berhasil diperbarui');

        } catch (Exception $e) {
            return response()->json([
                'message' => 'Kategori gagal diperbarui' . $e->getMessage()
            ], 500);
        }
    }

    public function deleteKategori($id){
        try {
            $kategori = Kategori_buku::destroy($id);

            if ($kategori) {
                return redirect()->route('kategori_buku')->with('success', 'Kategori berhasil dihapus');

            } else {
                throw new Exception("Tidak ada kategori dengan id $id");
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
