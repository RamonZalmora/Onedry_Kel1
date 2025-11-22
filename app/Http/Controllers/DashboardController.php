<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPelanggan = Pelanggan::count();
        $transaksiHariIni = Transaksi::whereDate('created_at', now())->count();
        $pendapatanMingguan = Transaksi::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->sum('total');
        $pendapatanBulanan = Transaksi::whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->sum('total');

        return view('dashboard', compact('totalPelanggan','transaksiHariIni','pendapatanMingguan','pendapatanBulanan'));
    }
}
