<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
<<<<<<< HEAD
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
=======

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class
>>>>>>> e4a0c53a79b5a34b9b0b79a9bc35d2252b30c210
        ]);
    }
}
