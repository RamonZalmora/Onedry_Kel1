@extends('layouts.app')
@section('content')

<h1 class="text-3xl font-bold mb-6">Edit Layanan</h1>

<form action="{{ route('layanan.update', $layanan) }}" method="POST" class="bg-white p-6 rounded-xl shadow space-y-4">
    @csrf
    @method('PUT')

    <!-- Nama -->
    <div>
        <label class="font-semibold">Nama Layanan</label>
        <input type="text" name="nama" value="{{ $layanan->nama }}" class="w-full border px-3 py-2 rounded-lg" required>
    </div>

    <!-- Tipe -->
    <div>
        <label class="font-semibold">Tipe</label>
        <select name="tipe" id="tipe" class="w-full border px-3 py-2 rounded-lg" required>
            <option value="per_kg" {{ $layanan->tipe == 'per_kg' ? 'selected' : '' }}>Per Kg</option>
            <option value="per_item" {{ $layanan->tipe == 'per_item' ? 'selected' : '' }}>Per Item</option>
        </select>
    </div>

    <!-- Sub Item -->
    <div id="subItemBox" style="{{ $layanan->tipe == 'per_item' ? '' : 'display:none;' }}">
        <label class="font-semibold">Sub Item</label>
        <input type="text" name="sub_item" value="{{ $layanan->sub_item }}" class="w-full border px-3 py-2 rounded-lg">
    </div>

    <!-- Harga -->
    <div>
        <label class="font-semibold">Harga</label>
        <input type="number" name="harga" value="{{ $layanan->harga }}" class="w-full border px-3 py-2 rounded-lg" required>
    </div>

    <button class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700">Update</button>
</form>

<script>
document.getElementById('tipe').addEventListener('change', function () {
    if (this.value === "per_item") {
        document.getElementById('subItemBox').style.display = "block";
    } else {
        document.getElementById('subItemBox').style.display = "none";
    }
});
</script>

@endsection
