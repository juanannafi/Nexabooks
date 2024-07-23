<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kategori_buku;
use Illuminate\Http\Request;

class KategoriApiController extends Controller
{
    public function index(){
        $kategoris = Kategori_buku::all();
        return response()->json(['message' => 'Success', 'data' => $kategoris ]);
    }

    public function show($id){
        $kategori = Kategori_buku::find($id);
        return response()->json(['message' => 'Success', 'data' => $kategori]);
    }
}
