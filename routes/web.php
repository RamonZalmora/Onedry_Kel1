<?php

use Illuminate\Support\Facades\Route;

// Controllers
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\ProfileController; // pastikan ada
// (other controllers...)

Route::get('/', function () {
    return redirect()->route('dashboard');
});

require __DIR__ . '/auth.php';

Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profil
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Admin only
    Route::middleware(['role:admin'])->group(function () {
        Route::resource('pelanggan', PelangganController::class);
        Route::resource('transaksi', TransaksiController::class)->except(['show']);
    });

    // Admin & Owner
    Route::middleware(['role:admin,owner'])->group(function () {
        Route::resource('layanan', LayananController::class)->except(['show']);
        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
        Route::get('/laporan/export-pdf', [LaporanController::class, 'exportPdf'])->name('laporan.pdf');
        Route::get('/laporan/export-excel', [LaporanController::class, 'exportExcel'])->name('laporan.excel');
    });

    // Owner only: Pengaturan (lihat daftar user) + create user
    Route::middleware(['role:owner'])->group(function () {
        Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan.index');

        // Halaman tambah akun (only owner)
        Route::get('/pengaturan/create', [PengaturanController::class, 'create'])->name('pengaturan.create');
        Route::post('/pengaturan', [PengaturanController::class, 'store'])->name('pengaturan.store');
    });
});
