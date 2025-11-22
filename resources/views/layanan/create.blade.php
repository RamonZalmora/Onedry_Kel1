@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-bold mb-4">Tambah Layanan</h1>
<form action="{{ route('layanan.store') }}" method="POST" class="bg-white p-6 rounded shadow w-1/2">
    @csrf
    <label>Nama</label>
    <input type="text" name="nama" class="w-full p-2 border mb-3" required>
    <label>Tipe (per_kg/per_item)</label>
    <input type="text" name="tipe" class="w-full p-2 border mb-3" required>
    <label>Harga</label>
    <input type="number" name="harga" class="w-full p-2 border mb-3" step="0.01" required>
    <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection
