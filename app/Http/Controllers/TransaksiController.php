<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Pelanggan;
use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with(['pelanggan', 'layanan'])
                        ->latest()
                        ->paginate(12);

        return view('transaksi.index', compact('transaksis'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        $layanans   = Layanan::all();

        return view('transaksi.create', compact('pelanggans', 'layanans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pelanggan_id'  => 'required|exists:pelanggans,id',
            'layanan_id'    => 'required|exists:layanans,id',
            'berat'         => 'required|numeric|min:0.1',
            'tanggal'       => 'required|date',
            'foto'          => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $layanan = Layanan::findOrFail($request->layanan_id);
        $total   = $layanan->harga * $request->berat;

        // Upload foto
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $namaFile = time() . '_' . $request->foto->getClientOriginalName();

        // Simpan ke folder public/uploads/foto_cucian
            $request->foto->move(public_path('uploads/foto_cucian'), $namaFile);

            $fotoPath = 'uploads/foto_cucian/' . $namaFile;
}


        // Simpan transaksi
        Transaksi::create([
            'kode'              => 'TRX-' . strtoupper(Str::random(6)),
            'pelanggan_id'      => $request->pelanggan_id,
            'layanan_id'        => $request->layanan_id,
            'berat'             => $request->berat,
            'total'             => $total,
            'status'            => 'baru',
            'foto'              => $fotoPath,
            'kasir'             => auth()->user()->name,
            'tanggal'           => $request->tanggal,
            'tanggal_diambil'   => null, // default kosong
        ]);

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dibuat.');
    }

    public function edit(Transaksi $transaksi)
    {
        $statuses = ['baru', 'proses', 'selesai', 'diambil'];

        return view('transaksi.edit', compact('transaksi', 'statuses'));
    }

    public function update(Request $request, Transaksi $transaksi)
{
    $request->validate([
        'status' => 'required|in:baru,proses,selesai,diambil'
    ]);

    $tanggalDiambil = $transaksi->tanggal_diambil;

    // Jika status baru diubah menjadi "selesai"
    if ($request->status === 'selesai') {
        $tanggalDiambil = now(); // isi otomatis tanggal hari ini
    }

    // Jika status kembali diganti dari selesai ke lainnya → kosongkan
    if ($request->status !== 'selesai') {
        $tanggalDiambil = null;
    }

    $transaksi->update([
        'status'            => $request->status,
        'tanggal_diambil'   => $tanggalDiambil,
    ]);

    return redirect()->route('transaksi.index')->with('success', 'Status transaksi diperbarui.');
}

    public function destroy(Transaksi $transaksi)
    {
        if ($transaksi->foto) {
            Storage::disk('public')->delete($transaksi->foto);
        }

        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi dihapus.');
    }

    public function show(Transaksi $transaksi)
    {
        $transaksi->load(['pelanggan', 'layanan']);

        $statuses = ['baru', 'proses', 'selesai', 'diambil'];

        return view('transaksi.show', compact('transaksi', 'statuses'));
    }
}
