@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-extrabold bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent">
        ⚙️ Daftar Layanan
    </h1>
    <a href="{{ route('layanan.create') }}" 
       class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-semibold px-4 py-2 rounded-lg shadow-md hover:shadow-lg hover:scale-105 transition-transform duration-200">
        + Tambah
    </a>
</div>

<div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100">
    <table class="w-full border-collapse overflow-hidden rounded-lg">
        <thead class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white">
            <tr>
                <th class="p-3 text-left font-semibold">Nama</th>
                <th class="p-3 text-left font-semibold">Tipe</th>
                <th class="p-3 text-left font-semibold">Sub Item</th> 
                <th class="p-3 text-left font-semibold">Harga</th>
                <th class="p-3 text-left font-semibold w-32">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($layanans as $l)
            <tr class="border-b hover:bg-purple-50 transition">
                <td class="p-3 text-gray-800">{{ $l->nama }}</td>
                <td class="p-3 text-gray-800">{{ $l->tipe == 'per_item' ? 'Per Item' : 'Per Kg' }}</td>
                <td class="p-3 text-gray-800">
                    {{ $l->tipe == 'per_item' ? ($l->sub_item ?? '-') : '-' }}
                </td>
                <td class="p-3 text-gray-800">
                    Rp {{ number_format($l->harga, 0, ',', '.') }}
                </td>
                <td class="p-3 flex items-center gap-3">
                    <a href="{{ route('layanan.edit', $l) }}" 
                       class="text-yellow-600 hover:text-yellow-700 font-semibold transition">
                       ✏️ Edit
                    </a>
                    <form action="{{ route('layanan.destroy', $l) }}" method="POST" 
                          onsubmit="return confirm('Yakin ingin menghapus layanan ini?')" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-700 font-semibold transition">🗑️ Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-4 text-center text-gray-500 italic">
                    Belum ada data layanan.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-5 flex justify-center">
        {{ $layanans->links() }}
    </div>
</div>
@endsection
