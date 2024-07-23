<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\BukuApiController;
use App\Http\Controllers\Api\KategoriApiController;
use App\Http\Controllers\Api\TransaksiApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//register
Route::post('/register', [AuthApiController::class, 'register']);
//login
Route::post('/login', [AuthApiController::class, 'login']);

Route::group([
    'middleware' => ['auth:sanctum']
], function(){
    //profile
    Route::get('profile', [AuthApiController::class, 'profile']);
    //logout
    Route::get('logout', [AuthApiController::class, 'logout']);

    //pinjaman per user
    Route::get('/transaksi-all', [TransaksiApiController::class, 'allTransaksi']);

    Route::get('/show-peminjaman', [TransaksiApiController::class, 'getPeminjam']);

    Route::post('/pinjam', [TransaksiApiController::class, 'pinjam']);

    //keranjang
    Route::get('/keranjang', [TransaksiApiController::class, 'show']);
    Route::post('/keranjang/pinjam', [TransaksiApiController::class, 'pinjam']);


    //buku
    Route::get('/buku', [BukuApiController::class, 'index']);
    Route::get('/buku/{id}', [BukuApiController::class, 'show']);

    //kategori
    Route::get('/kategori', [KategoriApiController::class, 'index']);
    Route::get('/kategori/{id}', [KategoriApiController::class, 'show']);
});

//buku
Route::post('/buku', [BukuApiController::class, 'store']);
Route::put('/buku/{id}', [BukuApiController::class, 'update']);
Route::delete('/buku/{id}', [BukuApiController::class, 'destroy']);

//kategori


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

//kategori
// Route::post('kategori/create', [KategoriController::class, 'createKategori']);
// Route::get('kategori/show', [KategoriController::class, 'showKategori']);
// Route::get('kategori/show/{id}', [KategoriController::class, 'showKategoriById']);
// Route::put('kategori/update/{id}', [KategoriController::class, 'updateKategori']);
// Route::delete('kategori/delete/{id}', [KategoriController::class, 'deleteKategori']);

//buku
// Route::post('buku/create', [BukuController::class, 'createBuku']);
// Route::get('buku/show', [BukuController::class, 'showBuku']);
// Route::get('buku/show/{id}', [BukuController::class, 'showBukuById']);
// Route::put('buku/update/{id}', [BukuController::class, 'updateBuku']);
// Route::delete('buku/delete/{id}', [BukuController::class, 'deleteBuku']);

//user
// Route::post('user/create', [UserController::class, 'createUser']);
// Route::get('user/show', [UserController::class, 'showUser']);
// Route::get('user/show/{id}', [UserController::class, 'showUserById']);
// Route::put('user/update/{id}', [UserController::class, 'updateUser']);
// Route::delete('user/delete/{is}', [UserController::class, 'deleteUser']);
