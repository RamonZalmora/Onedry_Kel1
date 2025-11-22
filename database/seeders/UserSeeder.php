<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
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
        ]);
    }
}
