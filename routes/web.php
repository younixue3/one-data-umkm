<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\IkmController;
use App\Http\Controllers\BigindustriController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\Dashboard\ProfilController as DashboardProfilController;
use App\Http\Controllers\Dashboard\BidangController as DashboardBidangController;
use App\Http\Controllers\Dashboard\NewsController as DashboardNewsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProdukController;
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/bidang/{category}', [BidangController::class, 'index'])->name('bidang.index');
Route::resource('bidang', BidangController::class)->only(['show', 'edit', 'update', 'store', 'destroy']);
Route::get('berita/{kategori}', [NewsController::class, 'index'])->name('berita.index');
Route::resource('dokumen', DokumenController::class);
Route::resource('kegiatan', KegiatanController::class);
Route::resource('produk', ProdukController::class);
Route::get('/harga-bahan-pokok', [HomeController::class, 'hargaBahanPokok'])->name('harga_bahan_pokok');
Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda');
Route::get('/profil/{category?}', [ProfilController::class, 'index'])->name('profil');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');
// Route::get('/profil/visi-misi', [HomeController::class, 'visiMisi'])->name('visi_misi');
// Route::get('/profil/tugas-pokok-fungsi', [HomeController::class, 'tugasPokokFungsi'])->name('tugas_pokok_fungsi');
Route::get('/satu-data', [HomeController::class, 'satuData'])->name('satu_data');
Route::get('/satu-data/perdagangan', [HomeController::class, 'satuDataPerdagangan'])->name('satu_data_perdagangan');
Route::get('/satu-data/koperasi-ukm', [HomeController::class, 'satuDataKoperasiUkm'])->name('satu_data_koperasi_ukm');
Route::get('/satu-data/pelatihan', [HomeController::class, 'satuDataPelatihan'])->name('satu_data_pelatihan');
Route::get('/satu-data/pemetaan-pelatihan', [HomeController::class, 'satuDataPemetaanPelatihan'])->name('satu_data_pemetaan_pelatihan');

Route::middleware(['auth', 'verified'])->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    // Route::resource('event', EventController::class);
    // Route::resource('product', ProductController::class);
    Route::resource('news', DashboardNewsController::class);
    Route::resource('user', UsersController::class);
    Route::resource('ikm', IkmController::class);
    Route::resource('bigindustri', BigindustriController::class);
    Route::resource('profil', DashboardProfilController::class);
    Route::resource('bidang', DashboardBidangController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('dashboard/ikm/import', [IkmController::class, 'import'])->name('dashboard.ikm.import');
Route::post('dashboard/bigindustri/import', [BigindustriController::class, 'import'])->name('dashboard.bigindustri.import');

require __DIR__.'/auth.php';
