<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;

class BukuApiController extends Controller
{
    public function index(){
        $bukus = Buku::all();
        return response()->json(['message' => 'Success', 'data' => $bukus ]);
    }

    public function show($id){
        $buku = Buku::find($id);
        return response()->json(['message' => 'Success', 'data' => $buku]);
    }

    public function store(Request $request){
        $buku = Buku::create($request->all());
        return response()->json(['message' => 'Data has been inserted successfully', 'data' => $buku]);
    }

    public function update(Request $request, $id){
        $buku = Buku::find($id);
        $buku->update($request->all());
        return response()->json(['message' => 'Success update', 'data' => $buku]);
    }

    public function destroy($id){
        $buku = Buku::find($id);
        $buku->delete();
        return response()->json(['message' => 'success delete', 'data' => null]);
    }
}
