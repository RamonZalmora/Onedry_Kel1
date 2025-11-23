<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
    'kode',
    'pelanggan_id',
    'layanan_id',
    'berat',
    'total',
    'status',
    'foto',
    'kasir',
    'tanggal',
    'tanggal_diambil',

];


    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }
}
