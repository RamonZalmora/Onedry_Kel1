@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-8 rounded-2xl shadow-lg border border-purple-100">

    <h2 class="text-2xl font-extrabold text-purple-700 mb-6">Tambah Akun Baru</h2>

    <form action="{{ route('pengaturan.store') }}" method="POST">
        @csrf

        <!-- Nama -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Nama</label>
            <input type="text" name="name" class="w-full border-gray-300 rounded-lg shadow-sm"
                   required>
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Email</label>
            <input type="email" name="email" class="w-full border-gray-300 rounded-lg shadow-sm"
                   required>
        </div>

        <!-- Role -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Role</label>
            <select name="role" class="w-full border-gray-300 rounded-lg shadow-sm" required>
                <option value="admin">Admin</option>
                <option value="owner">Owner</option>
                
            </select>
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Password</label>
            <input type="password" name="password" class="w-full border-gray-300 rounded-lg shadow-sm"
                   required>
        </div>

        <!-- Tombol -->
        <div class="flex justify-between mt-6">
            <a href="{{ route('pengaturan.index') }}" class="text-purple-600 hover:underline">← Kembali</a>
            <button class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white px-5 py-2 rounded-lg shadow hover:opacity-90 transition">
                Simpan
            </button>
        </div>

    </form>

</div>
@endsection
