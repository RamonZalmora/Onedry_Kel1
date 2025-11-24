<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksisTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('transaksis')->insert([
            [
                'id' => 1,
                'kode' => 'TRX-8NJFFW',
                'tanggal' => null,
                'pelanggan_id' => 1,
                'layanan_id' => 1,
                'berat' => 2.00,
                'total' => 6000.00,
                'status' => 'proses',
                'foto' => null,
                'kasir' => 'mimin',
                'created_at' => '2025-11-21 16:52:53',
                'updated_at' => '2025-11-23 15:50:19',
                'tanggal_diambil' => null,
            ],
            [
                'id' => 2,
                'kode' => 'TRX-NBCUVE',
                'tanggal' => null,
                'pelanggan_id' => 2,
                'layanan_id' => 1,
                'berat' => 4.00,
                'total' => 12000.00,
                'status' => 'selesai',
                'foto' => 'foto_cucian/zDsvVkOO1Hj040CXvwyqprvyhBgXLcO2UqPu3FoO.jpg',
                'kasir' => 'mimin',
                'created_at' => '2025-11-23 14:18:32',
                'updated_at' => '2025-11-23 15:49:50',
                'tanggal_diambil' => '2025-11-23',
            ],
            [
                'id' => 3,
                'kode' => 'TRX-QDALRK',
                'tanggal' => '2025-11-23',
                'pelanggan_id' => 1,
                'layanan_id' => 1,
                'berat' => 5.00,
                'total' => 15000.00,
                'status' => 'baru',
                'foto' => 'foto_cucian/s9TM1585wLlWyo1mlsdHulnRft0XxvReiM4p7lGT.jpg',
                'kasir' => 'mimin',
                'created_at' => '2025-11-23 15:54:03',
                'updated_at' => '2025-11-23 15:54:03',
                'tanggal_diambil' => null,
            ],
            [
                'id' => 5,
                'kode' => 'TRX-BRF3OV',
                'tanggal' => '2025-11-24',
                'pelanggan_id' => 1,
                'layanan_id' => 2,
                'berat' => 1.00,
                'total' => 7000.00,
                'status' => 'baru',
                'foto' => null,
                'kasir' => 'miminn',
                'created_at' => '2025-11-24 12:46:24',
                'updated_at' => '2025-11-24 12:46:24',
                'tanggal_diambil' => null,
            ],
        ]);
    }
}
