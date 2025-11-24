<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPelanggan = Pelanggan::count();
        $transaksiHariIni = Transaksi::whereDate('created_at', now())->count();
        $pendapatanMingguan = Transaksi::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->sum('total');
        $pendapatanBulanan = Transaksi::whereBetween('created_at', [now()->startOfMonth(), now()->endOfMonth()])->sum('total');
        $recentPelanggan = Pelanggan::latest()->take(5)->get();
        $recentTransaksi = Transaksi::with(['pelanggan', 'layanan'])
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalPelanggan',
            'transaksiHariIni',
            'pendapatanMingguan',
            'pendapatanBulanan',
            'recentPelanggan',
            'recentTransaksi'
        ));
    }
}
