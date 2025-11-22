<?php

namespace App\Exports;

use App\Models\Transaksi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TransaksiExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Transaksi::with(['pelanggan','layanan'])
            ->get()
            ->map(function($t){
                return [
                    'Kode' => $t->kode,
                    'Pelanggan' => $t->pelanggan->nama,
                    'Layanan' => $t->layanan->nama,
                    'Berat (Kg)' => $t->berat,
                    'Total (Rp)' => $t->total,
                    'Status' => ucfirst($t->status),
                    'Tanggal' => $t->created_at->format('Y-m-d H:i'),
                ];
            });
    }

    public function headings(): array
    {
        return ['Kode','Pelanggan','Layanan','Berat (Kg)','Total (Rp)','Status','Tanggal'];
    }
}
