<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Layanan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LayananTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_tidak_bisa_mengakses_layanan()
    {
        $this->get('/layanan')
            ->assertRedirect('/login');
    }

    /** @test */
    public function admin_bisa_melihat_halaman_layanan()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        $this->actingAs($user)
             ->get('/layanan')
             ->assertStatus(200);
    }

    /** @test */
    public function admin_bisa_membuat_layanan_baru()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        $response = $this->actingAs($user)->post('/layanan', [
            'nama' => 'Cuci Setrika',
            'tipe' => 'per_kg',
            'sub_item' => null,
            'harga' => 7000,
        ]);

        $response->assertRedirect('/layanan');
        $this->assertDatabaseHas('layanans', ['nama' => 'Cuci Setrika']);
    }

    /** @test */
    public function admin_bisa_update_layanan()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        $layanan = Layanan::create([
            'nama' => 'Cuci',
            'tipe' => 'per_kg',
            'harga' => 5000
        ]);

        $response = $this->actingAs($user)->put("/layanan/{$layanan->id}", [
            'nama' => 'Cuci Setrika',
            'tipe' => 'per_kg',
            'harga' => 7000,
        ]);

        $response->assertRedirect('/layanan');
        $this->assertDatabaseHas('layanans', ['nama' => 'Cuci Setrika']);
    }

    /** @test */
    public function admin_bisa_menghapus_layanan()
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        $layanan = Layanan::create([
            'nama' => 'Cuci',
            'tipe' => 'per_kg',
            'harga' => 5000
        ]);

        $response = $this->actingAs($user)->delete("/layanan/{$layanan->id}");

        $response->assertRedirect('/layanan');
        $this->assertDatabaseMissing('layanans', ['id' => $layanan->id]);
    }
}
