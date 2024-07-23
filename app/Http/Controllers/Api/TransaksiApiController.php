<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Detail_peminjaman;
use App\Models\Peminjaman;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiApiController extends Controller
{
    public function allTransaksi()
    {
        try {
            $keranjang = Peminjaman::with('detail_peminjaman')->where('peminjam_id', auth()->user()->id)->where('status', '<', 4)->latest()->get();
            $buku = Buku::all();
            $detail_peminjaman = Detail_peminjaman::with('buku')->whereIn('peminjaman_id', $keranjang->pluck('id'))->whereIn('buku_id', $buku->pluck('id'))->latest()->get();


            return response([
                'message' => 'success get allTransaksi',
                'data' =>  ['keranjang' => $keranjang, 'detail_peminjaman' => $detail_peminjaman]
            ], 200);
        } catch (Exception $e) {
            return response([
                'message' => 'error get allTransaksi',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show()
    {
        try {
            $keranjang = Peminjaman::latest()->where('peminjam_id', auth()->user()->id)->first();

            if (!$keranjang) {
                return response()->json([
                    'message' => 'Keranjang tidak ditemukan',
                    'data' => null
                ], 404);
            }

            return response()->json([
                'message' => 'success',
                'data' => $keranjang
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'error',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getPeminjaman()
    {
        try {
            $keranjang = Peminjaman::where('peminjam_id', auth()->user()->id)->where('status', '<', 3)->latest()->get();
            $detail_peminjaman = Detail_peminjaman::whereIn('peminjaman_id', $keranjang->pluck('id'))->get();

            return response([
                'message' => 'success get peminjaman',
                'data' =>  ['keranjang' => $keranjang, 'detail_peminjaman' => $detail_peminjaman]
            ], 200);
        } catch (Exception $e) {
            return response([
                'message' => 'error get peminjaman',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function pinjam(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'tanggal_pinjam' => 'required|date|after_or_equal:today'
            ]);

            $keranjang = [
                'peminjam_id' => auth()->user()->id,
                'tanggal_pinjam' => $validatedData['tanggal_pinjam'],
                'status' => 1,
                'tanggal_kembali' => Carbon::create($validatedData['tanggal_pinjam'])->addDays(10)
            ];

            $newPeminjaman = Peminjaman::create($keranjang);

            return response()->json([
                'status' => 'success',
                'message' => 'Peminjaman berhasil dibuat',
                'data' => $newPeminjaman
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // public function pinjam(Request $request)
    // {
    //     try {
    //         $validatedData = $request->validate([
    //             'peminjam_id' => 'required|exists:users,id',
    //             'tanggal_pinjam' => 'required|date|after_or_equal:today'
    //         ]);

    //         // Menambahkan data ke array keranjang
    //         $keranjang = [
    //             'peminjam_id' => $validatedData['peminjam_id'],
    //             'tanggal_pinjam' => $validatedData['tanggal_pinjam'],
    //             'status' => 1,
    //             'tanggal_kembali' => Carbon::create($validatedData['tanggal_pinjam'])->addDays(10)
    //         ];

    //         $newPeminjaman = Peminjaman::create($keranjang);

    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'Peminjaman berhasil dibuat',
    //             'data' => $newPeminjaman
    //         ], 201);
    //     } catch (Exception $e) {
    //         return response()->json([
    //             'status' => 'error',
    //             'message' => $e->getMessage()
    //         ], 500);
    //     }
    // }


}
