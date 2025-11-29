<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Pelanggan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PelangganTest extends TestCase
{
    use RefreshDatabase;

    private function admin()
    {
        return User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);
    }

    /** @test */
    public function guest_tidak_bisa_mengakses_pelanggan()
    {
        $this->get('/pelanggan')
             ->assertRedirect('/login');
    }

    /** @test */
    public function admin_bisa_melihat_daftar_pelanggan()
    {
        $user = $this->admin();

        $this->actingAs($user)
             ->get('/pelanggan')
             ->assertStatus(200);
    }

    /** @test */
    public function admin_bisa_menambah_pelanggan()
    {
        $user = $this->admin();

        $response = $this->actingAs($user)->post('/pelanggan', [
            'nama' => 'Budi',
            'no_hp' => '08123456789',
            'alamat' => 'Pekanbaru'
        ]);

        $response->assertRedirect('/pelanggan');
        $this->assertDatabaseHas('pelanggans', ['nama' => 'Budi']);
    }

    /** @test */
    public function admin_bisa_update_pelanggan()
    {
        $user = $this->admin();

        $p = Pelanggan::create([
            'nama' => 'Budi',
            'no_hp' => '08123',
            'alamat' => 'Alamat lama'
        ]);

        $response = $this->actingAs($user)->put("/pelanggan/{$p->id}", [
            'nama' => 'Budi Update',
            'no_hp' => '0812345',
            'alamat' => 'Alamat Baru'
        ]);

        $response->assertRedirect('/pelanggan');
        $this->assertDatabaseHas('pelanggans', ['nama' => 'Budi Update']);
    }

    /** @test */
    public function admin_bisa_menghapus_pelanggan()
    {
        $user = $this->admin();

        $p = Pelanggan::create([
            'nama' => 'Budi',
            'no_hp' => '0800',
            'alamat' => 'ABC'
        ]);

        $response = $this->actingAs($user)->delete("/pelanggan/{$p->id}");

        $response->assertRedirect('/pelanggan');
        $this->assertDatabaseMissing('pelanggans', ['id' => $p->id]);
    }
}
