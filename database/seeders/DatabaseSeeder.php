<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Jalankan semua seeder aplikasi.
     */
    public function run(): void
    {
        // Jalankan seeder UserSeeder
        $this->call([
            UserSeeder::class,
        ]);
    }
}
