@extends('layouts.app')
@section('content')
<div class="mb-6">
    <h1 class="text-3xl font-bold">Edit Layanan</h1>
    <p class="text-sm text-slate-500 mt-1">
        Ubah data layanan: {{ $layanan->nama }}
    </p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <!-- Form -->
    <div class="lg:col-span-2">
        <form action="{{ route('layanan.update', $layanan) }}" method="POST" 
              class="bg-white rounded-2xl shadow-md p-8">
            @csrf
            @method('PUT')

            <div class="space-y-5">

                <!-- Nama -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Nama Layanan
                    </label>

                    <select
                        name="nama"
                        id="nama_layanan"
                        class="w-full px-4 py-2 rounded-lg border border-slate-200 bg-white focus:shadow-md focus:border-blue-300 focus:ring-0 transition"
                        required
                    >
                        <option value="">-- Pilih Layanan --</option>

                        <!-- Per Kg -->
                        <option value="Cuci Lipat"
                            data-tipe="per_kg"
                            data-harga="7000"
                            {{ $layanan->nama == 'Cuci Lipat' ? 'selected' : '' }}>
                            Cuci Lipat (Per Kg)
                        </option>

                        <option value="Cuci Setrika"
                            data-tipe="per_kg"
                            data-harga="9000"
                            {{ $layanan->nama == 'Cuci Setrika' ? 'selected' : '' }}>
                            Cuci Setrika (Per Kg)
                        </option>

                        <option value="Setrika Saja"
                            data-tipe="per_kg"
                            data-harga="6000"
                            {{ $layanan->nama == 'Setrika Saja' ? 'selected' : '' }}>
                            Setrika Saja (Per Kg)
                        </option>

                        <option value="Dry Cleaning"
                            data-tipe="per_kg"
                            data-harga="20000"
                            {{ $layanan->nama == 'Dry Cleaning' ? 'selected' : '' }}>
                            Dry Cleaning (Per Kg)
                        </option>

                        <!-- Laundry Satuan -->
                        <option value="Laundry Satuan"
                            data-tipe="per_item"
                            {{ $layanan->nama == 'Laundry Satuan' ? 'selected' : '' }}>
                            Laundry Satuan
                        </option>
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
                        id="tipe_layanan"
                        name="tipe"
                        value="{{ $layanan->tipe }}"
                        class="w-full px-4 py-2 rounded-lg border border-slate-200 bg-gray-100"
                        readonly
                        required
                    >
                    @error('tipe')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Sub Item Laundry Satuan -->
                <div id="sub_item_container"
                     style="display: {{ $layanan->nama == 'Laundry Satuan' ? 'block' : 'none' }};">

                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Jenis Item
                    </label>

                    <select
                        name="sub_item"
                        id="sub_item"
                        class="w-full px-4 py-2 rounded-lg border border-slate-200 bg-white focus:shadow-md focus:border-blue-300 focus:ring-0 transition"
                    >
                        <option value="">-- Pilih Item --</option>

                        <option value="Kaos / Celana Biasa" data-harga="8000"
                            {{ $layanan->sub_item == 'Kaos / Celana Biasa' ? 'selected' : '' }}>
                            Kaos / Celana Biasa - Rp 8.000
                        </option>

                        <option value="Kemeja" data-harga="10000"
                            {{ $layanan->sub_item == 'Kemeja' ? 'selected' : '' }}>
                            Kemeja - Rp 10.000
                        </option>

                        <option value="Jeans" data-harga="12000"
                            {{ $layanan->sub_item == 'Jeans' ? 'selected' : '' }}>
                            Jeans - Rp 12.000
                        </option>

                        <option value="Jaket / Hoodie" data-harga="15000"
                            {{ $layanan->sub_item == 'Jaket / Hoodie' ? 'selected' : '' }}>
                            Jaket / Hoodie - Rp 15.000
                        </option>

                        <option value="Jas" data-harga="25000"
                            {{ $layanan->sub_item == 'Jas' ? 'selected' : '' }}>
                            Jas - Rp 25.000
                        </option>

                        <option value="Gaun" data-harga="25000"
                            {{ $layanan->sub_item == 'Gaun' ? 'selected' : '' }}>
                            Gaun - Rp 25.000
                        </option>

                        <option value="Baju Batik" data-harga="12000"
                            {{ $layanan->sub_item == 'Baju Batik' ? 'selected' : '' }}>
                            Baju Batik - Rp 12.000
                        </option>
                    </select>
                </div>

                <!-- Harga -->
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Harga
                    </label>

                    <div class="relative">
                        <span class="absolute left-4 top-2.5 text-slate-500 font-semibold">Rp</span>
                        <input 
                            type="number"
                            name="harga"
                            id="harga_layanan"
                            value="{{ $layanan->harga }}"
                            class="w-full pl-12 pr-4 py-2 rounded-lg border border-slate-200 bg-gray-100"
                            readonly
                            required
                        >
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex gap-3 mt-8 pt-6 border-t border-slate-200">
                <button type="submit"
                        class="flex-1 px-6 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition font-semibold shadow-sm">
                    Update Layanan
                </button>
                <a href="{{ route('layanan.index') }}"
                   class="flex-1 px-6 py-2.5 bg-slate-100 text-slate-700 rounded-lg hover:bg-slate-200 transition font-semibold text-center">
                    Batal
                </a>
            </div>
        </form>
    </div>

    <!-- Info Box -->
    <div class="lg:col-span-1">
        <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-2xl shadow-md p-6 sticky top-8">
            <h3 class="font-semibold text-slate-900 mb-3">📊 Informasi Layanan</h3>

            <ul class="text-sm text-slate-700 space-y-2">
                <li><strong>Dibuat:</strong> {{ $layanan->created_at->format('d/m/Y') }}</li>
                <li><strong>Tipe:</strong> {{ ucfirst(str_replace('_', ' ', $layanan->tipe)) }}</li>
                <li><strong>Harga Saat Ini:</strong> Rp {{ number_format($layanan->harga, 0, ',', '.') }}</li>
            </ul>
        </div>
    </div>
</div>

<script>
// Ubah ketika memilih layanan
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

// Ubah harga ketika memilih sub item (laundry satuan)
document.getElementById('sub_item').addEventListener('change', function () {
    let harga = this.options[this.selectedIndex].getAttribute('data-harga');
    document.getElementById('harga_layanan').value = harga;
});
</script>

@endsection
