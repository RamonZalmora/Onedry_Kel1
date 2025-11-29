@extends('layouts.app')
@section('title', 'Profil Saya')

@section('content')

<div class="mb-8">
    <h1 class="text-3xl font-extrabold bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent">
        👤 Pengaturan Profil
    </h1>
    <p class="text-slate-500 mt-1">Kelola informasi akun dan foto profil Anda</p>
</div>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    {{-- FOTO PROFIL --}}
    <div class="bg-white p-6 rounded-2xl shadow-lg border border-purple-100 flex flex-col items-center">
        <h2 class="text-lg font-bold text-purple-700 mb-4">Foto Profil</h2>

        <img src="{{ auth()->user()->foto 
            ? asset('storage/profile_photos/' . auth()->user()->foto)
            : 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}"
             class="w-32 h-32 rounded-full shadow object-cover mb-4">

        <form action="{{ route('profile.foto') }}" method="POST" enctype="multipart/form-data" class="w-full">
            @csrf
            <input type="file" name="foto" accept="image/*" 
                   class="w-full text-sm border p-2 rounded-lg mb-3">

            <button class="w-full bg-gradient-to-r from-purple-600 to-indigo-600 text-white py-2 rounded-lg shadow">
                Upload Foto Baru
            </button>
        </form>
    </div>

    {{-- INFORMASI & PASSWORD --}}
    <div class="lg:col-span-2 bg-white p-6 rounded-2xl shadow-lg border border-indigo-100">
        
        <h2 class="text-xl font-bold text-indigo-700 mb-4">📝 Informasi Profil</h2>
        @include('profile.partials.update-profile-information-form')

        <hr class="my-6">

        <h2 class="text-xl font-bold text-indigo-700 mb-4">🔐 Ganti Password</h2>
        @include('profile.partials.update-password-form')
    </div>

</div>

{{-- DELETE USER --}}
<div class="mt-8 bg-white p-6 rounded-2xl shadow-lg border border-red-200">
    <h2 class="text-xl font-bold text-red-600 mb-4">⚠️ Hapus Akun</h2>
    <p class="text-sm text-red-500 mb-3">Tindakan ini tidak dapat dibatalkan.</p>

    @include('profile.partials.delete-user-form')
</div>

@endsection
