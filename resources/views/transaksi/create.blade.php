@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-bold mb-4">Tambah Transaksi</h1>
<form action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow w-2/3">
    @csrf
    <label>Pelanggan</label>
    <select name="pelanggan_id" class="w-full p-2 border mb-3">
        @foreach($pelanggans as $p)
            <option value="{{ $p->id }}">{{ $p->nama }}</option>
        @endforeach
    </select>

    <label>Layanan</label>
    <select name="layanan_id" class="w-full p-2 border mb-3" id="layananSelect">
        @foreach($layanans as $l)
            <option value="{{ $l->id }}" data-harga="{{ $l->harga }}">{{ $l->nama }} - Rp {{ number_format($l->harga,0,',','.') }}</option>
        @endforeach
    </select>

    <label>Berat (Kg)</label>
    <input type="number" step="0.1" name="berat" id="beratInput" class="w-full p-2 border mb-3">

    <label>Perkiraan Total</label>
    <div id="perkiraan" class="mb-3 p-2 bg-gray-100 rounded">Rp 0</div>

    <label>Foto Cucian (opsional)</label>
    <input type="file" name="foto" class="w-full p-2 border mb-3">

    <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
</form>

<script>
document.addEventListener('DOMContentLoaded', function(){
    const layananSelect = document.getElementById('layananSelect');
    const beratInput = document.getElementById('beratInput');
    const perkiraan = document.getElementById('perkiraan');

    function hitung() {
        const selected = layananSelect.options[layananSelect.selectedIndex];
        const harga = parseFloat(selected.dataset.harga || 0);
        const berat = parseFloat(beratInput.value || 0);
        const total = harga * berat;
        perkiraan.innerText = 'Rp ' + new Intl.NumberFormat('id-ID').format(total.toFixed(0));
    }

    layananSelect.addEventListener('change', hitung);
    beratInput.addEventListener('input', hitung);
});
</script>
@endsection
