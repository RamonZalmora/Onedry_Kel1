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
                        <th class="px-4 py-3 font-semibold">Nama</th>
                        <th class="px-4 py-3 font-semibold">Email</th>
                        <th class="px-4 py-3 font-semibold">Role</th>
                        <th class="px-4 py-3 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($users as $user)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="px-4 py-3">{{ $user->name }}</td>
                            <td class="px-4 py-3">{{ $user->email }}</td>
                            <td class="px-4 py-3 capitalize">{{ $user->role }}</td>
                            <td class="px-4 py-3 flex items-center justify-center gap-3">

                                <!-- Tombol Edit -->
                                <a href="{{ route('pengaturan.edit', $user->id) }}"
                                   class="px-3 py-1 bg-blue-500 text-white rounded shadow hover:bg-blue-600 transition">
                                    Edit
                                </a>

                                <!-- Tombol Hapus -->
                                @if($user->id !== auth()->id())
                                <form action="{{ route('pengaturan.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Hapus akun ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="px-3 py-1 bg-red-600 text-white rounded shadow hover:bg-red-700 transition">
                                        Hapus
                                    </button>
                                </form>
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
