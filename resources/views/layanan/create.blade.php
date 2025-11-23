@extends('layouts.app')
@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold">Tambah Layanan Baru</h1>
    <p class="text-sm text-slate-500 mt-1">Tambahkan jenis layanan cucian yang baru</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Form -->
    <div class="lg:col-span-2">
        <form action="{{ route('layanan.store') }}" method="POST" class="bg-white rounded-2xl shadow-md p-8">
            @csrf

            <div class="space-y-5">

                <!-- Nama -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Nama Layanan</label>

                    <select 
                        name="nama" 
                        id="nama_layanan"
                        class="w-full px-4 py-2 rounded-lg border border-slate-200 bg-white focus:shadow-md focus:border-blue-300 focus:ring-0 transition"
                        required
                    >
                        <option value="">-- Pilih Layanan --</option>

                        <!-- Per Kg -->
                        <option value="Cuci Lipat" data-tipe="per_kg" data-harga="7000">Cuci Lipat (Per Kg)</option>
                        <option value="Cuci Setrika" data-tipe="per_kg" data-harga="9000">Cuci Setrika (Per Kg)</option>
                        <option value="Setrika Saja" data-tipe="per_kg" data-harga="6000">Setrika Saja (Per Kg)</option>
                        <option value="Dry Cleaning" data-tipe="per_kg" data-harga="20000">Dry Cleaning (Per Kg)</option>

                        <!-- Laundry Satuan -->
                        <option value="Laundry Satuan" data-tipe="per_item">Laundry Satuan</option>
                    </select>

                    @error('nama')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tipe -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Tipe Layanan</label>
                    <input 
                        type="text" 
                        name="tipe" 
                        id="tipe_layanan"
                        class="w-full px-4 py-2 rounded-lg border border-slate-200 bg-gray-100"
                        readonly
                        required
                    >
                    @error('tipe')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Sub Item Laundry Satuan -->
                <div id="sub_item_container" style="display:none;">
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Jenis Item</label>

                    <select 
                        name="sub_item"
                        id="sub_item"
                        class="w-full px-4 py-2 rounded-lg border border-slate-200 bg-white focus:shadow-md focus:border-blue-300 focus:ring-0 transition"
                    >
                        <option value="">-- Pilih Item --</option>
                        <option value="Kaos / Celana Biasa" data-harga="8000">Kaos / Celana Biasa - Rp 8.000</option>
                        <option value="Kemeja" data-harga="10000">Kemeja - Rp 10.000</option>
                        <option value="Jeans" data-harga="12000">Jeans - Rp 12.000</option>
                        <option value="Jaket / Hoodie" data-harga="15000">Jaket / Hoodie - Rp 15.000</option>
                        <option value="Jas" data-harga="25000">Jas - Rp 25.000</option>
                        <option value="Gaun" data-harga="25000">Gaun - Rp 25.000</option>
                        <option value="Baju Batik" data-harga="12000">Baju Batik - Rp 12.000</option>
                    </select>
                </div>

                <!-- Harga -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">Harga</label>

                    <div class="relative">
                        <span class="absolute left-4 top-2.5 text-slate-500 font-semibold">Rp</span>
                        <input 
                            type="number" 
                            name="harga" 
                            id="harga_layanan"
                            class="w-full pl-12 pr-4 py-2 rounded-lg border border-slate-200 bg-gray-100"
                            readonly
                            required
                        >
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-3 mt-8 pt-6 border-t border-slate-200">
                <button type="submit" class="flex-1 px-6 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-semibold shadow-sm">
                    Simpan Layanan
                </button>
                <a href="{{ route('layanan.index') }}" class="flex-1 px-6 py-2.5 bg-slate-100 text-slate-700 rounded-lg hover:bg-slate-200 transition font-semibold text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>

    <!-- Info Box -->
    <div class="lg:col-span-1">
        <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl shadow-md p-6 sticky top-8">
            <h3 class="font-semibold text-slate-900 mb-3">💡 Jenis Layanan</h3>
            <ul class="text-sm text-slate-700 space-y-3">
                <li>
                    <strong class="text-indigo-600">Per Kilogram</strong>
                    <p class="text-xs mt-0.5">Harga dihitung berdasarkan berat dalam kg</p>
                </li>
                <li>
                    <strong class="text-indigo-600">Per Item</strong>
                    <p class="text-xs mt-0.5">Harga dihitung berdasarkan jumlah item</p>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
document.getElementById('nama_layanan').addEventListener('change', function () {
    let opt   = this.options[this.selectedIndex];
    let tipe  = opt.getAttribute('data-tipe');
    let harga = opt.getAttribute('data-harga');

    if (this.value === 'Laundry Satuan') {
        document.getElementById('sub_item_container').style.display = 'block';
        document.getElementById('harga_layanan').value = '';
        document.getElementById('tipe_layanan').value  = 'per_item';
    } else {
        document.getElementById('sub_item_container').style.display = 'none';
        document.getElementById('sub_item').value = '';
        document.getElementById('tipe_layanan').value  = tipe ?? '';
        document.getElementById('harga_layanan').value = harga ?? '';
    }
});

// Sub Item Change
document.getElementById('sub_item').addEventListener('change', function () {
    let harga = this.options[this.selectedIndex].getAttribute('data-harga');
    document.getElementById('harga_layanan').value = harga;
});
</script>

@endsection
