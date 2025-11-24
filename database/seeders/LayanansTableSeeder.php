<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LayanansTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('layanans')->insert([
            [
                'id' => 1,
                'nama' => 'Cuci biasa',
                'tipe' => 'per_kg',
                'sub_item' => null,
                'harga' => 3000.00,
                'created_at' => '2025-11-21 16:52:36',
                'updated_at' => '2025-11-21 16:52:36',
            ],
            [
                'id' => 2,
                'nama' => 'Cuci Lipat',
                'tipe' => 'per_kg',
                'sub_item' => null,
                'harga' => 7000.00,
                'created_at' => '2025-11-23 14:17:50',
                'updated_at' => '2025-11-23 14:17:50',
            ],
            [
                'id' => 3,
                'nama' => 'Dry Cleaning',
                'tipe' => 'per_kg',
                'sub_item' => null,
                'harga' => 20000.00,
                'created_at' => '2025-11-24 12:57:54',
                'updated_at' => '2025-11-24 12:57:54',
            ],
            [
                'id' => 4,
                'nama' => 'Setrika Saja',
                'tipe' => 'per_kg',
                'sub_item' => null,
                'harga' => 6000.00,
                'created_at' => '2025-11-24 12:58:13',
                'updated_at' => '2025-11-24 12:58:13',
            ],
        ]);
    }
}
