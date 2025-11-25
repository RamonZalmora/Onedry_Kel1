@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-8 rounded-2xl shadow-lg border border-purple-100">

    <h2 class="text-2xl font-extrabold text-purple-700 mb-6">Edit Akun</h2>

    <form action="{{ route('pengaturan.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Nama -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Nama</label>
            <input type="text" name="name" value="{{ $user->name }}"
                   class="w-full border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Email</label>
            <input type="email" name="email" value="{{ $user->email }}"
                   class="w-full border-gray-300 rounded-lg shadow-sm" required>
        </div>

        <!-- Role -->
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Role</label>
            <select name="role" class="w-full border-gray-300 rounded-lg shadow-sm">
                <option value="admin" {{ $user->role=='admin'?'selected':'' }}>Admin</option>
                <option value="owner" {{ $user->role=='owner'?'selected':'' }}>Owner</option>
                <option value="karyawan" {{ $user->role=='karyawan'?'selected':'' }}>Karyawan</option>
            </select>
        </div>

        <!-- Tombol -->
        <div class="flex justify-between mt-6">
            <a href="{{ route('pengaturan.index') }}" class="text-purple-600 hover:underline">← Kembali</a>
            <button class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white px-5 py-2 rounded-lg shadow hover:opacity-90 transition">
                Update
            </button>
        </div>

    </form>

</div>
@endsection
