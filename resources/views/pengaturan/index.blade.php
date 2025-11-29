@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">

    <!-- Header -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h2 class="text-3xl font-extrabold text-gray-800">Pengaturan Sistem</h2>
            <p class="text-sm text-gray-500">Kelola akun pengguna sistem OneDry</p>
        </div>

        @if(auth()->user()->role === 'owner')
            <a href="{{ route('pengaturan.create') }}"
               class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white px-5 py-2 rounded-lg shadow hover:opacity-90 transition">
                ➕ Tambah Akun
            </a>
        @endif
    </div>

    <!-- Table Wrapper -->
    <div class="bg-white p-6 rounded-2xl shadow-lg border border-purple-100">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="bg-purple-50 text-purple-700 border-b">
                        <th class="px-4 py-3 font-semibold">Akun</th>
                        <th class="px-4 py-3 font-semibold">Email</th>
                        <th class="px-4 py-3 font-semibold">Role</th>
                        <th class="px-4 py-3 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                        <tr class="border-b hover:bg-gray-50 transition">

                            <!-- FOTO PROFIL / AVATAR -->
                            <td class="px-4 py-3 flex items-center gap-4">

                                <!-- Jika user punya foto -->
                                @if($user->foto)
                                    <img
                                        src="{{ asset('storage/profile_photos/' . $user->foto) }}"
                                        class="h-12 w-12 rounded-full object-cover shadow-md"
                                        alt="Foto Profil">
                                @else
                                    <!-- Avatar huruf -->
                                    <div class="h-12 w-12 rounded-full bg-gradient-to-br from-purple-500 to-indigo-600 
                                                text-white text-lg font-bold flex items-center justify-center shadow-md">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                @endif

                                <!-- Nama -->
                                <span class="text-gray-800 font-medium text-base">
                                    {{ $user->name }}
                                </span>
                            </td>

                            <!-- Email -->
                            <td class="px-4 py-3">{{ $user->email }}</td>

                            <!-- Role -->
                            <td class="px-4 py-3 capitalize">{{ $user->role }}</td>

                            <!-- Aksi -->
                            <td class="px-4 py-3 text-center">

                                @if($user->id !== auth()->id())
                                <form action="{{ route('pengaturan.destroy', $user->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Hapus akun ini?')"
                                      class="inline-block">
                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="px-3 py-1 bg-red-600 text-white rounded shadow hover:bg-red-700 transition">
                                        Hapus
                                    </button>
                                </form>
                                @else
                                    <span class="text-gray-400 text-xs">Akun Anda</span>
                                @endif

                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection
