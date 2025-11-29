@extends('layouts.app')
@section('title', 'Tambah Layanan')
@section('content')

<!-- HEADER -->
<div class="mb-8">
    <h1 class="text-3xl font-extrabold bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent">
        ➕ Tambah Layanan Baru
    </h1>
    <p class="text-sm text-slate-500 mt-1">Pilih template layanan atau isi secara manual</p>
</div>


<div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

    <!-- FORM CARD -->
    <form action="{{ route('layanan.store') }}" method="POST"
        class="glass border border-purple-100 rounded-2xl shadow-xl p-8 space-y-6 backdrop-blur-xl">
        @csrf

        <!-- Template -->
        <div>
            <label class="block font-semibold text-gray-700 mb-2">Template Layanan</label>

            <select id="templateLayanan"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-purple-500 focus:ring-purple-500 transition">
                <option value="">🌟 Pilih Template Otomatis</option>

                <optgroup label="Per Kg">
                    <option value="Cuci Lipat" data-tipe="per_kg" data-harga="7000">Cuci Lipat (7.000 / Kg)</option>
                    <option value="Cuci Setrika" data-tipe="per_kg" data-harga="9000">Cuci Setrika (9.000 / Kg)</option>
                    <option value="Setrika Saja" data-tipe="per_kg" data-harga="6000">Setrika Saja (6.000 / Kg)</option>
                    <option value="Dry Cleaning" data-tipe="per_kg" data-harga="20000">Dry Cleaning (20.000 / Kg)</option>
                </optgroup>

                <optgroup label="Per Item">
                    <option value="Laundry Satuan" data-tipe="per_item">Laundry Satuan</option>
                </optgroup>
            </select>
        </div>

        <!-- Nama -->
        <div>
            <label class="block font-semibold text-gray-700 mb-2">Nama Layanan</label>
            <input type="text" name="nama" id="nama"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-purple-500 focus:ring-purple-500 transition"
                placeholder="Cuci Lipat, Setrika Saja, Laundry Satuan, dll" required>
        </div>

        <!-- Tipe -->
        <div>
            <label class="block font-semibold text-gray-700 mb-2">Tipe</label>
            <select name="tipe" id="tipe"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 bg-white focus:border-purple-500 focus:ring-purple-500 transition"
                required>
                <option value="">-- Pilih Tipe --</option>
                <option value="per_kg">Per Kg</option>
                <option value="per_item">Per Item</option>
            </select>
        </div>

        <!-- Sub Item -->
        <div id="subItemBox" style="display:none;">
            <label class="block font-semibold text-gray-700 mb-2">Sub Item</label>
            <input type="text" name="sub_item" id="sub_item"
                class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:border-purple-500 focus:ring-purple-500 transition"
                placeholder="Contoh: Kemeja, Batik, Jas, Hoodie, dll">
        </div>

        <!-- Harga -->
        <div>
            <label class="block font-semibold text-gray-700 mb-2">Harga</label>
            <div class="relative">
                <span class="absolute left-3 top-2.5 text-gray-500 font-semibold">Rp</span>
                <input type="number" name="harga" id="harga"
                    class="w-full pl-10 px-4 py-2 rounded-lg border border-gray-300 focus:border-purple-500 focus:ring-purple-500 transition"
                    placeholder="0" required>
            </div>
        </div>

        <!-- Button -->
        <button
            class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 text-white py-3 rounded-lg font-semibold shadow-lg hover:scale-105 transition-transform">
            💾 Simpan Layanan
        </button>
    </form>


    <!-- Info Box -->
    <div class="bg-white rounded-2xl shadow-lg p-6 border border-purple-100">
        <h3 class="text-xl font-semibold text-purple-700 mb-4">📘 Informasi Layanan</h3>

        <ul class="text-gray-700 text-sm space-y-3 leading-relaxed">
            <li>
                <strong class="text-purple-600">Per Kg</strong><br>
                Digunakan untuk layanan berbasis berat cucian (contoh: Cuci Lipat, Dry Cleaning).
            </li>

            <li>
                <strong class="text-purple-600">Per Item</strong><br>
                Digunakan untuk laundry pakaian tertentu seperti: Kemeja, Jas, Hoodie, Batik, dll.
            </li>

            <li class="bg-purple-50 border border-purple-200 rounded-lg p-3 text-purple-800 text-sm">
                Jika memilih "<strong>Laundry Satuan</strong>", kamu dapat menentukan sub item secara manual.
            </li>
        </ul>
    </div>

</div>


<script>
document.getElementById('templateLayanan').addEventListener('change', function () {
    let opt = this.options[this.selectedIndex];

    document.getElementById('nama').value = opt.value || "";
    document.getElementById('tipe').value = opt.dataset.tipe || "";
    document.getElementById('harga').value = opt.dataset.harga || "";

    // Show/hide sub item
    if (opt.dataset.tipe === "per_item") {
        document.getElementById('subItemBox').style.display = "block";
    } else {
        document.getElementById('subItemBox').style.display = "none";
        document.getElementById('sub_item').value = "";
    }
});
</script>

@endsection
