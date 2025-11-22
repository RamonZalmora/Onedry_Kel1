<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD

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
=======
use Illuminate\Http\Request;

// -----------------------------------------
// ROUTE UNTUK USER BELUM LOGIN (GUEST)
// -----------------------------------------
Route::middleware('guest')->group(function(){

    Route::get('/login', function(){
        return view('session.login-session');
    })->name('login');

    Route::post('/session', function(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // login dummy OWNER
        if($request->email == 'owner@example.com' && $request->password == 'owner123'){
            session([
                'user'=>[
                    'name' => 'Owner',
                    'email'=> $request->email,
                    'role' => 'owner'
                ]
            ]);
            return redirect('/dashboard');
        }

        // login dummy ADMIN (pegawai)
        if($request->email == 'admin@example.com' && $request->password == 'admin123'){
            session([
                'user'=>[
                    'name' => 'Admin Pegawai',
                    'email'=> $request->email,
                    'role' => 'admin'
                ]
            ]);
            return redirect('/dashboard');
        }

        return back()->withErrors(['email'=>'Email atau password salah']);
    });

});


// -----------------------------------------
// ROUTE UNTUK USER SUDAH LOGIN
// -----------------------------------------
Route::group([], function () {

    Route::get('/', function(){
        if(!session('user')) return redirect('/login');
        return view('dashboard');
    });

    Route::get('/dashboard', function(){
        if(!session('user')) return redirect('/login');
        return view('dashboard');
    })->name('dashboard');

    Route::get('/pelanggan', function(){
        if(!session('user')) return redirect('/login');
        return view('pelanggan');
    })->name('pelanggan');

    Route::get('/layanan', function(){
        if(!session('user')) return redirect('/login');
        return view('layanan');
    })->name('layanan');

    Route::get('/transaksi', function(){
        if(!session('user')) return redirect('/login');
        return view('transaksi');
    })->name('transaksi');

    // khusus owner
    Route::get('/laporan', function(){
        if(!session('user')) return redirect('/login');
        if(session('user.role') != 'owner') abort(403);
        return view('laporan');
    })->name('laporan');

    Route::get('/logout', function(){
        session()->forget('user');
        return redirect('/login');
    })->name('logout');

});
>>>>>>> e4a0c53a79b5a34b9b0b79a9bc35d2252b30c210
