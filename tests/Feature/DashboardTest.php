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
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@mail.com',
            'password' => bcrypt('password'),
            'role' => 'admin' // sesuaikan jika user punya role
        ]);

        $this->actingAs($user)
             ->get('/dashboard')
             ->assertStatus(200)
             ->assertSee('OneDry Management Panel'); // cek judul dashboard
    }
}
