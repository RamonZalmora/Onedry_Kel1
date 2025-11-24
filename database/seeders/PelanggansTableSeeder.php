<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PelanggansTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('pelanggans')->insert([
            [
                'id' => 1,
                'nama' => 'Raudhatul Jannah',
                'no_hp' => '082388306695',
                'alamat' => 'Jalan Garuda Sakti, Kecamatan Tampan',
                'created_at' => '2025-11-21 16:50:44',
                'updated_at' => '2025-11-21 16:50:44',
            ],
            [
                'id' => 2,
                'nama' => 'joshua',
                'no_hp' => '081234564455',
                'alamat' => 'Elang Sakti',
                'created_at' => '2025-11-23 14:01:15',
                'updated_at' => '2025-11-23 14:01:15',
            ],
            [
                'id' => 3,
                'nama' => 'Rahmadini',
                'no_hp' => '0823445566778',
                'alamat' => 'Taman Karya',
                'created_at' => '2025-11-23 16:21:56',
                'updated_at' => '2025-11-23 16:21:56',
            ],
        ]);
    }
}
