<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 
        'tipe', 
        'sub_item',
        'harga',
    ];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}
