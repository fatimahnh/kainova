<?php

use Illuminate\Support\Facades\Route;

// Public Controllers (Gabungan milikmu & temanmu)
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SpmbController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\Public\ContactController;
use App\Http\Controllers\AuthController;

// Admin Controllers
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProdukController as AdminProdukController;
use App\Http\Controllers\Admin\KategoriProdukController;
use App\Http\Controllers\Admin\ProgramPklController;
use App\Http\Controllers\Admin\BursaKerjaController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\AlumniController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\PrestasiController;
use App\Http\Controllers\Admin\DokumentasiController as AdminDokumentasiController;
use App\Http\Controllers\Admin\AiSettingController;
use App\Http\Controllers\Admin\ContactAdminController;

// Models (Dari route milikmu)
use App\Models\Guru;
use App\Models\Fasilitas;

/*
|--------------------------------------------------------------------------
| 1. PUBLIC FRONTEND ROUTES
|--------------------------------------------------------------------------
*/

// Home & Profil
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/profil', function () {
    $gurus = Guru::all();
    $fasilitas = Fasilitas::all();
    return view('frontend.profil', compact('gurus', 'fasilitas'));
})->name('profil');

// Fitur Dinamis dari Temanmu (Spmb, Produk, Dokumentasi)
Route::get('/spmb', [SpmbController::class, 'index'])->name('spmb');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::get('/produk/{slug}', [ProdukController::class, 'detail'])->name('produk.detail');
Route::get('/dokumentasi', [DokumentasiController::class, 'index'])->name('dokumentasi');

// Halaman Statis / View-only dari Milikmu
Route::view('/pkl', 'frontend.pkl')->name('pkl');
Route::view('/bkk', 'frontend.bkk')->name('bkk');
Route::view('/prestasi', 'frontend.prestasi')->name('prestasi');
Route::view('/alumni', 'frontend.alumni')->name('alumni');

// Kontak Public (opsional)
// Route::get('/kontak', [ContactController::class, 'index'])->name('kontak');


/*
|--------------------------------------------------------------------------
| 2. AUTHENTICATION ROUTES
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/*
|--------------------------------------------------------------------------
| 3. PROTECTED ADMIN ROUTES
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Management Resources
    Route::resource('produk', AdminProdukController::class);
    Route::resource('kategori', KategoriProdukController::class)->only(['index', 'store', 'destroy']);
    Route::resource('pkl', ProgramPklController::class);
    Route::resource('bkk', BursaKerjaController::class);
    Route::resource('guru', GuruController::class);
    Route::resource('alumni', AlumniController::class)->parameters(['alumni' => 'alumni']);
    Route::resource('banner', BannerController::class);
    Route::resource('prestasi', PrestasiController::class);
    Route::resource('dokumentasi', AdminDokumentasiController::class);

    // AI Setting & Generate Deskripsi
    Route::get('/ai-setting', [AiSettingController::class, 'index'])->name('ai-setting.index');
    Route::post('/ai-setting', [AiSettingController::class, 'update'])->name('ai-setting.update');
    Route::post('/ai-setting/test', [AiSettingController::class, 'testChat'])->name('ai-setting.test');
    Route::post('/generate-deskripsi-ai', [AiSettingController::class, 'generateDeskripsi'])->name('ai.generate-deskripsi');

    // Admin Kontak & Media Sosial (Digunakan di Footer)
    Route::get('/kontak', [ContactAdminController::class, 'index'])->name('kontak.index');
    Route::post('/kontak', [ContactAdminController::class, 'update'])->name('kontak.update');
});