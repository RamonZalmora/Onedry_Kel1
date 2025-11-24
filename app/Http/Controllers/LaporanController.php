<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Spatie\SimpleExcel\SimpleExcelWriter;

class LaporanController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['pelanggan','layanan'])->get();
        return view('laporan.index', compact('transaksis'));
    }

    public function exportPdf()
    {
        $transaksis = Transaksi::with(['pelanggan','layanan'])->get();
        $pdf = Pdf::loadView('laporan.pdf', compact('transaksis'));
        return $pdf->download('laporan-transaksi.pdf');
    }

    public function exportExcel()
    {
        $transaksis = Transaksi::with(['pelanggan','layanan'])->get();

        $writer = SimpleExcelWriter::streamDownload('laporan-transaksi.xlsx');

        foreach ($transaksis as $t) {
            $writer->addRow([
                'Kode'       => $t->kode,
                'Pelanggan'  => $t->pelanggan->nama,
                'Layanan'    => $t->layanan->nama,
                'Berat (Kg)' => $t->berat,
                'Total (Rp)' => $t->total,
                'Status'     => ucfirst($t->status),
                'Tanggal'    => $t->created_at->format('Y-m-d H:i'),
            ]);
        }

        return $writer->toBrowser();
    }

    /**
     * Menampilkan laporan harian
     */
    public function harian()
    {
        $tanggal = request('tanggal', now()->format('Y-m-d'));
        $transaksis = Transaksi::with(['pelanggan', 'layanan'])
            ->whereDate('created_at', $tanggal)
            ->latest()
            ->get();

        return view('laporan.harian', compact('transaksis', 'tanggal'));
    }

    /**
     * Menampilkan laporan bulanan
     */
    public function bulanan()
    {
        $bulan = request('bulan', now()->format('Y-m'));
        $transaksis = Transaksi::with(['pelanggan', 'layanan'])
            ->whereYear('created_at', '=', date('Y', strtotime($bulan)))
            ->whereMonth('created_at', '=', date('m', strtotime($bulan)))
            ->latest()
            ->get();

        $totalPendapatan = $transaksis->sum('total');

        return view('laporan.bulanan', compact('transaksis', 'bulan', 'totalPendapatan'));
    }
}