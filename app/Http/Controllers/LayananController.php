<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Tampilkan daftar layanan.
     */
    public function index()
    {
        $layanans = Layanan::latest()->paginate(10);
        return view('layanan.index', compact('layanans'));
    }

    /**
     * Halaman tambah layanan baru.
     */
    public function create()
    {
        return view('layanan.create');
    }

    /**
     * Simpan layanan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'tipe'      => 'required|in:per_kg,per_item',
            'harga'     => 'required|numeric|min:0',
            'sub_item'  => 'nullable|string|max:255',
        ]);

        Layanan::create([
            'nama'      => $request->nama,
            'tipe'      => $request->tipe,
            'harga'     => $request->harga,
            'sub_item'  => $request->tipe === 'per_item' ? $request->sub_item : null
        ]);

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    /**
     * Halaman edit layanan.
     */
    public function edit(Layanan $layanan)
    {
        return view('layanan.edit', compact('layanan'));
    }

    /**
     * Update layanan.
     */
    public function update(Request $request, Layanan $layanan)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'tipe'      => 'required|in:per_kg,per_item',
            'harga'     => 'required|numeric|min:0',
            'sub_item'  => 'nullable|string|max:255',
        ]);

        $layanan->update([
            'nama'      => $request->nama,
            'tipe'      => $request->tipe,
            'harga'     => $request->harga,
            'sub_item'  => $request->tipe === 'per_item' ? $request->sub_item : null
        ]);

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    /**
     * Hapus layanan.
     */
    public function destroy(Layanan $layanan)
    {
        $layanan->delete();

        return redirect()->route('layanan.index')->with('success', 'Layanan berhasil dihapus.');
    }
}
