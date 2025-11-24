<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Admin OneDry',
                'email' => 'admin@onedry.test',
                'foto' => null,
                'role' => 'admin',
                'phone' => null,
                'email_verified_at' => null,
                'password' => '$2y$12$53RdmsbOLqYrG3G9C7HJr.vSUevJNFaxYbXwt6wdtJOV3QEN0bpeO',
                'remember_token' => null,
                'created_at' => '2025-11-12 09:06:26',
                'updated_at' => '2025-11-12 09:06:26',
            ],
            [
                'id' => 2,
                'name' => 'Owner OneDry',
                'email' => 'owner@onedry.test',
                'foto' => null,
                'role' => 'owner',
                'phone' => null,
                'email_verified_at' => null,
                'password' => '$2y$12$zUNnU4oJqfavJOWKLQSZIuKiailD5OgHKKerCohykX3F9pEuIabmG',
                'remember_token' => null,
                'created_at' => '2025-11-12 09:06:26',
                'updated_at' => '2025-11-12 09:06:26',
            ],
            [
                'id' => 4,
                'name' => 'owner',
                'email' => 'owner@gmail.com',
                'foto' => null,
                'role' => 'owner',
                'phone' => null,
                'email_verified_at' => null,
                'password' => '$2y$12$Rof/ts8SAm1rVH/3xvfr1.SiASgXUV.yzI5X9A953ipbHlEFIYcP2',
                'remember_token' => null,
                'created_at' => '2025-11-12 11:29:08',
                'updated_at' => '2025-11-12 11:29:08',
            ],
            [
                'id' => 7,
                'name' => 'miminn',
                'email' => 'mimin@gmail.com',
                'foto' => null,
                'role' => 'admin',
                'phone' => '082388306699',
                'email_verified_at' => null,
                'password' => '$2y$12$6h44L0o9D1VuA2rreIpm/OVE7RFgMVy1zGNko7MuaJCRBqB2rR8te',
                'remember_token' => null,
                'created_at' => null,
                'updated_at' => '2025-11-23 16:19:20',
            ],
        ]);
    }
}
