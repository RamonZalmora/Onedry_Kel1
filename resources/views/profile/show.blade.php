@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto">
    <div class="bg-white rounded-2xl shadow-lg border border-purple-100 p-8 flex flex-col md:flex-row gap-10">

        <!-- Bagian Foto Profil -->
        <div class="flex flex-col items-center md:w-1/3 text-center border-r md:border-gray-200">
            <div class="relative">
                <!-- Tampilkan foto profil dari storage jika ada -->
                @if(Auth::user()->foto && file_exists(public_path('storage/' . Auth::user()->foto)))
                    <img src="{{ asset('storage/' . Auth::user()->foto) }}" 
                         alt="Foto Profil" 
                         class="h-40 w-40 rounded-full object-cover border-4 border-purple-400 shadow-md">
                @else
                    <img src="{{ asset('images/default-avatar.png') }}" 
                         alt="Foto Default" 
                         class="h-40 w-40 rounded-full object-cover border-4 border-purple-400 shadow-md">
                @endif

                <!-- Tombol unggah foto -->
                <label for="foto" 
                       class="absolute bottom-2 right-2 bg-purple-600 hover:bg-purple-700 text-white text-xs px-3 py-1 rounded-full cursor-pointer shadow-md">
                    Ubah
                </label>
            </div>

            <h2 class="mt-4 text-xl font-semibold text-gray-800">{{ Auth::user()->name }}</h2>
            <p class="text-gray-500 text-sm">{{ Auth::user()->email }}</p>
            <span class="mt-2 inline-block bg-purple-100 text-purple-700 text-sm px-3 py-1 rounded-full">
                {{ ucfirst(Auth::user()->role ?? 'User') }}
            </span>
        </div>

        <!-- Formulir Profil -->
        <div class="flex-1">
            <h1 class="text-2xl font-bold text-purple-700 mb-6">Profil Saya</h1>

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="space-y-5">
                @csrf
                @method('PUT')

                <!-- Input file foto (disembunyikan tapi aktif lewat tombol Ubah) -->
                <input type="file" id="foto" name="foto" class="hidden" accept="image/*">

                <!-- Nama -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                    <input id="name" name="name" type="text" 
                           value="{{ old('name', Auth::user()->name) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" 
                           value="{{ old('email', Auth::user()->email) }}"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                </div>

                <!-- Password Baru -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password Baru (opsional)</label>
                    <input id="password" name="password" type="password"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                </div>

                <!-- Konfirmasi Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                </div>

                <!-- Tombol Aksi -->
                <div class="flex justify-between items-center pt-4 border-t">
                    <a href="{{ route('dashboard') }}" 
                       class="text-purple-600 hover:underline text-sm">
                        ← Kembali ke Dashboard
                    </a>
                    <button type="submit"
                            class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white px-5 py-2 rounded-md font-semibold hover:scale-105 transition-transform shadow-md">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
