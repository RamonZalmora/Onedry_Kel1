<?php

use Illuminate\Support\Facades\Route;

// Import semua Controller
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\ProfileController;

// Redirect root ke dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Route bawaan auth (login/register)
require __DIR__ . '/auth.php';

// Semua route ini hanya bisa diakses setelah login
Route::middleware(['auth'])->group(function () {

    /** -------------------------------
     *  DASHBOARD
     *  ------------------------------- */
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /** -------------------------------
     *  PROFIL USER
     *  (Upload foto profil + update data)
     *  ------------------------------- */
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // pakai PUT karena ini update data existing

    /** -------------------------------
     *  ADMIN ONLY
     *  ------------------------------- */
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('pelanggan', PelangganController::class);
        Route::resource('transaksi', TransaksiController::class)->except(['show']);
    });

    /** -------------------------------
     *  ADMIN & OWNER (akses gabungan)
     *  ------------------------------- */
    Route::middleware(['role:admin,owner'])->group(function () {
        Route::resource('layanan', LayananController::class)->except(['show']);

        // Laporan
        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
        Route::get('/laporan/export-pdf', [LaporanController::class, 'exportPdf'])->name('laporan.pdf');
        Route::get('/laporan/export-excel', [LaporanController::class, 'exportExcel'])->name('laporan.excel');
    });

    /** -------------------------------
     *  OWNER ONLY
     *  (Kelola akun pengguna)
     *  ------------------------------- */
    Route::middleware(['role:owner'])->group(function () {
        Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan.index');
        Route::get('/pengaturan/create', [PengaturanController::class, 'create'])->name('pengaturan.create');
        Route::post('/pengaturan', [PengaturanController::class, 'store'])->name('pengaturan.store');
    });
});
