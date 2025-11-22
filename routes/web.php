<?php

use Illuminate\Support\Facades\Route;
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