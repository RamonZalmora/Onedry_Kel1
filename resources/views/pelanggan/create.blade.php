@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-bold mb-4">Tambah Pelanggan</h1>
<form action="{{ route('pelanggan.store') }}" method="POST" class="bg-white p-6 rounded shadow w-1/2">
    @csrf
    <label>Nama</label>
    <input type="text" name="nama" class="w-full p-2 border mb-3" required>
    <label>No HP</label>
    <input type="text" name="no_hp" class="w-full p-2 border mb-3" required>
    <label>Alamat</label>
    <textarea name="alamat" class="w-full p-2 border mb-3" required></textarea>
    <button class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
</form>
@endsection
