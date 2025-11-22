<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
<<<<<<< HEAD
use App\Models\User;
=======
use Illuminate\Support\Facades\DB;
>>>>>>> e4a0c53a79b5a34b9b0b79a9bc35d2252b30c210
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
<<<<<<< HEAD
    public function run(): void
    {
        User::create([
            'name'=>'Admin OneDry',
            'email'=>'admin@onedry.test',
            'password'=>Hash::make('password'),
            'role'=>'admin',
        ]);

        User::create([
            'name'=>'Owner OneDry',
            'email'=>'owner@onedry.test',
            'password'=>Hash::make('password'),
            'role'=>'owner',
=======
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'email' => 'admin@softui.com',
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
>>>>>>> e4a0c53a79b5a34b9b0b79a9bc35d2252b30c210
        ]);
    }
}
