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

        // Daily revenue for the last 7 days
        $dailyRevenue = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = now()->subDays($i)->format('Y-m-d');
            $daily = Transaksi::whereDate('created_at', $date)->sum('total');
            $dailyRevenue[] = (int)$daily;
        }

        // Latest transactions (last 5)
        $latestTransaksis = Transaksi::with('pelanggan')->latest()->take(5)->get();

        return view('dashboard', compact(
            'totalPelanggan',
            'transaksiHariIni',
            'pendapatanMingguan',
            'pendapatanBulanan',
            'dailyRevenue',
            'latestTransaksis'
        ));
    }
}
