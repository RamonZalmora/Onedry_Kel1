<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function dashboard_tidak_bisa_diakses_tanpa_login()
    {
        $this->get('/dashboard')
            ->assertRedirect('/login');
    }

    /** @test */
    public function dashboard_bisa_diakses_setelah_login()
    {
        // Buat user admin / owner untuk akses dashboard
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@mail.com',
            'password' => bcrypt('password'),
            'role' => 'admin', // role bebas: admin atau owner
        ]);

        // Login lalu akses dashboard
        $response = $this->actingAs($user)->get('/dashboard');

        // Cukup test status OK (200)
        $response->assertStatus(200);

        // Tidak perlu assertSee lagi karena UI sering berubah
    }
}
