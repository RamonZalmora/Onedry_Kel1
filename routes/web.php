<?php

use Illuminate\Support\Facades\Route;

// Import Controller
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

// Route auth
require __DIR__ . '/auth.php';

Route::middleware(['auth'])->group(function () {

    /** Dashboard */
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    /** PROFILE (foto, info, password, hapus akun) */
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/foto', [ProfileController::class, 'updatePhoto'])->name('profile.foto');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    /** -------------------------------
     *  AKSES GABUNGAN ADMIN & OWNER
     *  ------------------------------- */
    Route::middleware(['role:admin,owner'])->group(function () {

        /** Pelanggan */
        Route::resource('pelanggan', PelangganController::class);

        /** Layanan */
        Route::resource('layanan', LayananController::class)->except(['show']);

        /** Transaksi */
        Route::resource('transaksi', TransaksiController::class);

        /** Laporan */
        Route::prefix('laporan')->name('laporan.')->group(function () {
            Route::get('/', [LaporanController::class, 'index'])->name('index');
            Route::get('/harian', [LaporanController::class, 'harian'])->name('harian');
            Route::get('/bulanan', [LaporanController::class, 'bulanan'])->name('bulanan');
            Route::get('/export-pdf', [LaporanController::class, 'exportPdf'])->name('pdf');
            Route::get('/export-excel', [LaporanController::class, 'exportExcel'])->name('excel');
        });
    });


    /** -------------------------------
     *  OWNER ONLY - Kelola Akun
     *  ------------------------------- */
    Route::middleware(['role:owner'])->group(function () {

        Route::prefix('pengaturan')->name('pengaturan.')->group(function () {

            Route::get('/', [PengaturanController::class, 'index'])->name('index');
            Route::get('/create', [PengaturanController::class, 'create'])->name('create');
            Route::post('/', [PengaturanController::class, 'store'])->name('store');

            Route::get('/{id}/edit', [PengaturanController::class, 'edit'])->name('edit');
            Route::put('/{id}', [PengaturanController::class, 'update'])->name('update');

            Route::delete('/{id}', [PengaturanController::class, 'destroy'])->name('destroy');
        });
    });

});
