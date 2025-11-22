@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Layanan</h1>
<form action="{{ route('layanan.update', $layanan) }}" method="POST" class="bg-white p-6 rounded shadow w-1/2">
    @csrf @method('PUT')
    <label>Nama</label>
    <input type="text" name="nama" class="w-full p-2 border mb-3" value="{{ $layanan->nama }}" required>
    <label>Tipe</label>
    <input type="text" name="tipe" class="w-full p-2 border mb-3" value="{{ $layanan->tipe }}" required>
    <label>Harga</label>
    <input type="number" name="harga" class="w-full p-2 border mb-3" value="{{ $layanan->harga }}" step="0.01" required>
    <button class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection
