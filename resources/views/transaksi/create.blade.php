@extends('layouts.app')
@section('title', 'Tambah Transaksi')

@section('content')

<!-- HEADER -->
<div class="mb-8">
    <h1 class="text-3xl font-extrabold bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent">
        ➕ Tambah Transaksi Baru
    </h1>
    <p class="text-sm text-slate-500 mt-1">Isi data transaksi dengan lengkap untuk mencatat laundry masuk</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

    <!-- FORM -->
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-xl p-8 border border-purple-100">

        {{-- ERROR MESSAGE --}}
        @if ($errors->any())
            <div class="mb-4 p-3 rounded bg-red-50 border border-red-200 text-sm text-red-700">
                <strong>Terdapat kesalahan:</strong>
                <ul class="mt-1 list-disc list-inside">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- Pelanggan -->
            <div>
                <label class="block font-semibold text-gray-700 mb-1">Pelanggan</label>
                <select name="pelanggan_id"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-purple-500 focus:ring-purple-500 transition" required>
                    <option value="">-- Pilih Pelanggan --</option>
                    @foreach($pelanggans as $p)
                        <option value="{{ $p->id }}">
                            {{ $p->nama }} - {{ $p->no_hp }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Tanggal Transaksi -->
            <div>
                <label class="block font-semibold text-gray-700 mb-1">Tanggal Transaksi</label>
                <input type="date" name="tanggal"
                       class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-purple-500 focus:ring-purple-500 transition"
                       required>
            </div>

            <!-- Tanggal Diambil -->
            <div>
                <label class="block font-semibold text-gray-700 mb-1">Tanggal Diambil (opsional)</label>
                <input type="date" name="tanggal_diambil"
                       class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-purple-500 focus:ring-purple-500 transition"
                       placeholder="Pilih tanggal pengambilan (jika sudah diketahui)">
            </div>

            <!-- Layanan -->
            <div>
                <label class="block font-semibold text-gray-700 mb-1">Layanan</label>
                <select name="layanan_id" id="layananSelect"
                        class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-purple-500 focus:ring-purple-500 transition"
                        required>
                    <option value="">-- Pilih Layanan --</option>

                    @foreach($layanans as $l)
                        <option value="{{ $l->id }}" data-harga="{{ $l->harga }}">
                            {{ $l->nama }}
                            @if($l->tipe == 'per_item' && $l->sub_item)
                                ({{ $l->sub_item }})
                            @endif
                            - Rp {{ number_format($l->harga, 0, ',', '.') }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Berat / Qty -->
            <div>
                <label class="block font-semibold text-gray-700 mb-1">Berat (Kg) / Jumlah Item</label>
                <input type="number" step="0.1" name="berat" id="beratInput"
                       class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-purple-500 focus:ring-purple-500 transition"
                       placeholder="Masukkan berat atau jumlah item"
                       required>
            </div>

            <!-- Perkiraan Total -->
            <div>
                <label class="block font-semibold text-gray-700 mb-1">Perkiraan Total</label>
                <div id="perkiraan"
                     class="px-4 py-2 bg-gray-100 border border-gray-300 rounded-lg text-lg font-semibold text-indigo-700">
                    Rp 0
                </div>
            </div>

            <!-- Foto -->
            <div>
                <label class="block font-semibold text-gray-700 mb-1">Foto Cucian (opsional)</label>
                <input type="file" name="foto"
                       class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-purple-500 focus:ring-purple-500 transition">
            </div>

            <!-- Tombol Submit -->
            <div class="flex gap-3 pt-4">
                <button class="flex-1 bg-gradient-to-r from-blue-600 to-blue-700 text-white py-3 rounded-lg font-semibold hover:scale-105 transition">
                    💾 Simpan Transaksi
                </button>

                <a href="{{ route('transaksi.index') }}"
                   class="flex-1 text-center bg-gray-200 text-gray-700 py-3 rounded-lg font-semibold hover:bg-gray-300 transition">
                    ❌ Batal
                </a>
            </div>
        </form>
    </div>

    <!-- INFO SIDEBAR -->
    <div class="bg-gradient-to-br from-indigo-50 to-purple-50 p-6 rounded-2xl shadow-md border border-purple-100">
        <h3 class="text-lg font-semibold text-gray-800 mb-4">ℹ️ Panduan Pengisian</h3>

        <ul class="text-sm text-gray-700 space-y-3">
            <li><strong>Pilih layanan</strong> sesuai pesanan pelanggan.</li>
            <li><strong>Perkiraan total</strong> akan muncul otomatis.</li>
            <li><strong>Foto cucian</strong> tidak wajib, namun sangat membantu dokumentasi.</li>
            <li><strong>Tanggal diambil</strong> opsional dan bisa diisi jika pelanggan sudah menentukan.</li>
        </ul>
    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const layananSelect = document.getElementById('layananSelect');
    const beratInput = document.getElementById('beratInput');
    const perkiraan = document.getElementById('perkiraan');

    function hitung() {
        const selected = layananSelect.options[layananSelect.selectedIndex];
        const harga = parseFloat(selected?.dataset?.harga || 0);
        const berat = parseFloat(beratInput.value || 0);

        const total = harga * berat;

        perkiraan.innerText = "Rp " + new Intl.NumberFormat('id-ID').format(total);
    }

    layananSelect.addEventListener('change', hitung);
    beratInput.addEventListener('input', hitung);
});
</script>

@endsection
