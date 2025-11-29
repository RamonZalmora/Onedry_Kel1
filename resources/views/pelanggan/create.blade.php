@extends('layouts.app')
@section('title', 'Tambah Pelanggan')

@section('content')

<!-- Header -->
<div class="mb-8">
    <h1 class="text-3xl font-extrabold bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent">
        ➕ Tambah Pelanggan Baru
    </h1>
    <p class="text-sm text-slate-500 mt-1">Masukkan data pelanggan dengan lengkap dan benar</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    <!-- FORM INPUT -->
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-xl p-8 border border-purple-100">

        <form action="{{ route('pelanggan.store') }}" method="POST" class="space-y-5">
            @csrf
            
            <!-- Nama -->
            <div>
                <label class="block font-semibold text-gray-700 mb-1">Nama Pelanggan</label>
                <input type="text" name="nama"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 
                           focus:border-purple-500 focus:ring-purple-500 transition"
                    placeholder="Nama lengkap pelanggan"
                    required>
            </div>

            <!-- Nomor HP -->
            <div>
                <label class="block font-semibold text-gray-700 mb-1">Nomor HP</label>
                <input type="text" name="no_hp"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 
                           focus:border-purple-500 focus:ring-purple-500 transition"
                    placeholder="Contoh: 08123456789"
                    required>
            </div>

            <!-- Alamat -->
            <div>
                <label class="block font-semibold text-gray-700 mb-1">Alamat</label>
                <textarea name="alamat" rows="3"
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 
                           focus:border-purple-500 focus:ring-purple-500 transition"
                    placeholder="Alamat lengkap pelanggan"
                    required></textarea>
            </div>

            <!-- Tombol -->
            <div class="flex gap-3 mt-6">
                <button type="submit"
                    class="flex-1 bg-gradient-to-r from-purple-600 to-indigo-600 text-white py-3 rounded-lg 
                           font-semibold shadow-lg hover:scale-105 transition-transform">
                    💾 Simpan Pelanggan
                </button>

                <a href="{{ route('pelanggan.index') }}"
                    class="flex-1 bg-gray-200 text-gray-700 py-3 rounded-lg font-semibold hover:bg-gray-300 
                           transition text-center">
                    ❌ Batal
                </a>
            </div>

        </form>

    </div>

    <!-- SIDEBAR INFO -->
    <div class="bg-gradient-to-br from-indigo-50 to-purple-50 
                rounded-2xl shadow-md p-6 border border-purple-100">

        <h3 class="text-lg font-semibold text-gray-800 mb-4">
            ℹ️ Informasi Pengisian
        </h3>

        <ul class="text-sm text-gray-700 space-y-3">

            <li>
                <strong class="text-indigo-600">Nama lengkap</strong>
                <p class="text-xs text-gray-500">
                    Gunakan nama asli pelanggan. Ini memudahkan pencarian data dan riwayat transaksi.
                </p>
            </li>

            <li>
                <strong class="text-indigo-600">Nomor HP aktif</strong>
                <p class="text-xs text-gray-500">
                    Usahakan nomor HP valid. Sistem akan dipakai untuk notifikasi atau pengingat pesanan.
                </p>
            </li>

            <li>
                <strong class="text-indigo-600">Alamat jelas</strong>
                <p class="text-xs text-gray-500">
                    Berguna saat pengantaran laundry atau pencatatan lokasi pelanggan.
                </p>
            </li>

            <li>
                <strong class="text-indigo-600">Data Terintegrasi</strong>
                <p class="text-xs text-gray-500">
                    Pelanggan yang Anda buat akan otomatis terhubung dengan transaksi dan laporan.
                </p>
            </li>
        </ul>

    </div>

</div>

@endsection
