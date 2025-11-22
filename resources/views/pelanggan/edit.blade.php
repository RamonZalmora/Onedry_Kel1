@extends('layouts.app')
@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Pelanggan</h1>
<form action="{{ route('pelanggan.update', $pelanggan) }}" method="POST" class="bg-white p-6 rounded shadow w-1/2">
    @csrf @method('PUT')
    <label>Nama</label>
    <input type="text" name="nama" class="w-full p-2 border mb-3" value="{{ $pelanggan->nama }}" required>
    <label>No HP</label>
    <input type="text" name="no_hp" class="w-full p-2 border mb-3" value="{{ $pelanggan->no_hp }}" required>
    <label>Alamat</label>
    <textarea name="alamat" class="w-full p-2 border mb-3" required>{{ $pelanggan->alamat }}</textarea>
    <button class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
</form>
@endsection
