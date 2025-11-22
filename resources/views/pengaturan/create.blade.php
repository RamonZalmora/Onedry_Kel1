@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Tambah Akun Baru</h2>

    <form action="{{ route('pengaturan.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium">Nama</label>
            <input type="text" name="name" value="{{ old('name') }}"
                   class="mt-1 block w-full border-gray-300 rounded p-2">
            @error('name') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email') }}"
                   class="mt-1 block w-full border-gray-300 rounded p-2">
            @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Role</label>
            <select name="role" class="mt-1 block w-full border-gray-300 rounded p-2">
                <option value="admin" {{ old('role')=='admin' ? 'selected':'' }}>Admin</option>
                <option value="owner" {{ old('role')=='owner' ? 'selected':'' }}>Owner</option>
            </select>
            @error('role') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Password</label>
            <input type="password" name="password" class="mt-1 block w-full border-gray-300 rounded p-2">
            @error('password') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="mt-1 block w-full border-gray-300 rounded p-2">
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('pengaturan.index') }}" class="text-blue-600 hover:underline">← Kembali</a>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Simpan Akun
            </button>
        </div>
    </form>
</div>
@endsection
