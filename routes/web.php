<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SekolahController;

Route::get('show-sekolah', [SekolahController::class, 'show'])->name('sekolah.show');

// registrasi & login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::post('/register', [AuthController::class, 'store'])->name('register');

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Grup route untuk SekolahController
    Route::controller(SekolahController::class)->group(function () {
        Route::get('/sekolah', 'index')->name('sekolah.index');
        Route::get('/sekolah/create', 'create')->name('sekolah.create');
        Route::post('/sekolah', 'store')->name('sekolah.store');
        Route::get('/sekolah/{sekolah}', 'show')->name('sekolah.show');
        Route::get('/sekolah/{sekolah}/edit', 'edit')->name('sekolah.edit');
        Route::put('/sekolah/{sekolah}', 'update')->name('sekolah.update');
        Route::delete('/sekolah/{sekolah}', 'destroy')->name('sekolah.destroy');
        Route::get('/get-kelurahan/{kecamatan_id}', 'getKelurahan')->name('get.kelurahan');
        Route::get('/get-kecamatan-by-kelurahan/{kelurahan_id}', 'getKecamatanByKelurahan')->name('get.kecamatan.by.kelurahan');
        Route::get('/api/kelurahan/{kecamatan_id}', 'getKelurahan')->name('api.kelurahan');
        Route::get('/sekolah/filter', 'filter')->name('sekolah.filter');
    });
    Route::get('admin', [SekolahController::class, 'index'])->name('admin.index');
});

//admin dashboard
// Route::get('admin', [AdminController::class, 'chart'])->name('admin.chart');

// index
Route::get('/', [HomeController::class, 'index'])->name('index');

// Tambahkan route sementara untuk test koneksi
Route::get('/test-db', function() {
    try {
        DB::connection()->getPdo();
        return "Berhasil terhubung ke database: " . DB::connection()->getDatabaseName();
    } catch (\Exception $e) {
        return "Tidak dapat terhubung ke database: " . $e->getMessage();
    }
});

Route::get('/filter-sekolah', [HomeController::class, 'filter'])->name('filter.sekolah');

Route::get('/get-kelurahan/{kecamatan_id}', function($kecamatan_id) {
    return App\Models\Kelurahan::where('kecamatan_id', $kecamatan_id)->get();
});
