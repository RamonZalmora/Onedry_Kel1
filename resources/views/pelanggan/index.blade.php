@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-extrabold bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent">
        📋 Daftar Pelanggan
    </h1>
    <a href="{{ route('pelanggan.create') }}" 
       class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-semibold px-4 py-2 rounded-lg shadow-md hover:shadow-lg hover:scale-105 transition-transform duration-200">
        + Tambah
    </a>
</div>

<div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100">
    <table class="w-full table-auto border-collapse overflow-hidden rounded-lg">
        <thead class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white">
            <tr>
                <th class="p-3 text-left font-semibold">Nama</th>
                <th class="p-3 text-left font-semibold">No HP</th>
                <th class="p-3 text-left font-semibold">Alamat</th>
                <th class="p-3 text-left font-semibold w-32">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pelanggans as $p)
            <tr class="border-b hover:bg-purple-50 transition">
                <td class="p-3 text-gray-800">{{ $p->nama }}</td>
                <td class="p-3 text-gray-800">{{ $p->no_hp }}</td>
                <td class="p-3 text-gray-800">{{ $p->alamat }}</td>
                <td class="p-3 flex items-center gap-3">
                    <a href="{{ route('pelanggan.edit', $p) }}" 
                       class="text-yellow-600 hover:text-yellow-700 font-semibold transition">
                       ✏️ Edit
                    </a>
                    <form action="{{ route('pelanggan.destroy', $p) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?')" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-700 font-semibold transition">🗑️ Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="p-4 text-center text-gray-500 italic">Belum ada data pelanggan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-5 flex justify-center">
        {{ $pelanggans->links() }}
    </div>
</div>
@endsection
