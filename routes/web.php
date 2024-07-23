
<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AuthController as ControllersAuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserViewController;
use App\Models\KategoriBuku;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('desain.landing_page');
})->name('landing_page');

Route::get('/signUp', function () {
    return view('register_new');
})->name('regis');


Route::get('/signIn', function () {
    return view('login_new');
})->name('login');


// Route::get('/', function () {
//     return view('login');
// })->name('login');

// Route::get('/regis', function () {
//     return view('register');
// })->name('regis');

//landing
Route::get('landing', [PeminjamController::class, 'home'])->name('landing _page');
Route::get('about', [PeminjamController::class, 'about'])->name('about');
Route::get('best', [PeminjamController::class, 'best'])->name('best');
Route::get('contact', [PeminjamController::class, 'contact'])->name('contact');

//search
Route::get('/search', [BukuController::class, 'search'])->name('search');
Route::get('/searchkategori', [KategoriController::class, 'searchkategori'])->name('searchkategori');
Route::get('/searchpetugas', [PetugasController::class, 'searchpetugas'])->name('searchpetugas');
Route::get('/searchuser', [UserController::class, 'searchuser'])->name('searchuser');
Route::get('/searchbookuser', [UserViewController::class, 'searchbookuser'])->name('searchbookuser');

//login
Route::post('/login', [AuthController::class, 'login'])->name('login_user');
Route::post(('/register'), [AuthController::class, 'register'])->name('register_user');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['auth', 'CekRole:user']], function () {
    //pov user
    Route::get('/dashboard', [UserViewController::class, 'showBook'])->name('userview');
    Route::post('/keranjang/{id}', [UserViewController::class, 'keranjang'])->name('tambah.keranjang');
    Route::get('/show/keranjang', [KeranjangController::class, 'show'])->name('show.keranjang');
    Route::get('/detailBuku/{id}', [UserViewController::class, 'detailBook'])->name('detailBook');
    Route::delete('/delete/keranjang/{id}', [KeranjangController::class, 'delete'])->name('delete.keranjang');
    Route::post('/pinjam/{id}', [KeranjangController::class, 'pinjam'])->name('pinjam.keranjang');
});


Route::group(['middleware' => ['auth', 'CekRole:petugas,admin']], function () {
    //buku
    Route::get('/perpus', [BukuController::class, 'buku'])->name('daftar_buku');
    Route::delete('buku/delete/{id}', [BukuController::class, 'deleteBuku'])->name('buku.delete');
    Route::post('buku/createbuku', [BukuController::class, 'createBuku'])->name('buku.create');
    Route::put('buku/update/{id}', [BukuController::class, 'updateBuku'])->name('buku.update');
    Route::get('/show/createBuku', [BukuController::class, 'showCreate'])->name('test');
    Route::get('/update/{id}', [BukuController::class, 'showEdit'])->name('test');

    //kategori
    Route::get('perpus/kategori', [KategoriController::class, 'kategori'])->name('kategori_buku');
    Route::delete('perpus/kategori/delete/{id}', [KategoriController::class, 'deleteKategori'])->name('kategori.delete');
    Route::post('perpus/kategori/create', [KategoriController::class, 'createKategori'])->name('kategori.create');
    Route::put('perpus/kategori/update/{id}', [KategoriController::class, 'updateKategori'])->name('kategori.update');

    Route::get('/transaksi/semua', [TransaksiController::class, 'index'])->name('transaksi.semua');
    Route::get('/transaksi/semua/cetak', [TransaksiController::class, 'cetak'])->name('transaksi.semua');

    Route::get('/cetak_form', [TransaksiController::class, 'cetakForm'])->name('cetak_form');
    Route::get('/cetak_pertanggal/{tglawal}/{tglakhir}', [TransaksiController::class, 'cetakTransaksiTanggal'])->name('cetak_pertanggal');
});


Route::group(['middleware' => ['auth', 'CekRole:admin']], function () {
    //user
    Route::get('perpus/user', [UserController::class, 'user'])->name('daftar_user');
    Route::post('perpus/user/create', [UserController::class, 'createUser'])->name('user.create');
    Route::delete('perpus/user/{id}', [UserController::class, 'deleteUser'])->name('user.delete');
    Route::put('perpus/user/update/{id}', [UserController::class, 'updateUser'])->name('user.update');

    //petugas
    Route::get('perpus/petugas', [PetugasController::class, 'petugas'])->name('daftar_petugas');
    Route::post('perpus/petugas/create', [PetugasController::class, 'createPetugas'])->name('petugas.create');
    Route::delete('perpus/petugas/{id}', [PetugasController::class, 'deletePetugas'])->name('petugas.delete');
    Route::put('perpus/petugas/update/{id}', [PetugasController::class, 'updatePetugas'])->name('petugas.update');
});


Route::group(['middleware' => ['auth', 'CekRole:petugas']], function () {
    //transaksi
    // Route::get('/transaksi/semua', [TransaksiController::class, 'index'])->name('transaksi.semua');
    Route::get('/transaksi/belumdipinjam', [TransaksiController::class, 'belumDipinjam'])->name('transaksi.belum');
    Route::get('/transaksi/sedangdipinjam', [TransaksiController::class, 'sedangDipinjam'])->name('transaksi.sedang');
    Route::get('/transaksi/selesaidipinjam', [TransaksiController::class, 'selesaiDipinjam'])->name('transaksi.selesai');
    Route::get('/transaksi/denda', [TransaksiController::class, 'denda'])->name('transaksi.denda');
    Route::get('/transaksi/tolakPeminjaman', [TransaksiController::class, 'tolakPeminjaman'])->name('transaksi.tolak');
    Route::post('/transaksi/tolak/{id}', [TransaksiController::class, 'tolak'])->name('transaksi.tolak');
    Route::post('/transaksi/pinjam/{id}', [TransaksiController::class, 'pinjam'])->name('transaksi.pinjam');
    Route::post('/transaksi/kembali/{id}', [TransaksiController::class, 'kembali'])->name('transaksi.kembali');
});
