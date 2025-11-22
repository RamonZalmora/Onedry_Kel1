@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-extrabold bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent">
        💸 Daftar Transaksi
    </h1>

    <a href="{{ route('transaksi.create') }}"
       class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-semibold px-5 py-2.5 rounded-lg shadow-md hover:shadow-lg hover:scale-105 transition-transform duration-200">
        + Transaksi Baru
    </a>
</div>

<div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100">
    <table class="w-full border-collapse overflow-hidden rounded-lg">
        <thead class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white">
            <tr>
                <th class="p-3 text-left font-semibold">Kode</th>
                <th class="p-3 text-left font-semibold">Pelanggan</th>
                <th class="p-3 text-left font-semibold">Layanan</th>
                <th class="p-3 text-left font-semibold">Berat</th>
                <th class="p-3 text-left font-semibold">Total</th>
                <th class="p-3 text-left font-semibold">Status</th>
                <th class="p-3 text-left font-semibold w-40">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transaksis as $t)
            <tr class="border-b hover:bg-purple-50 transition">
                <td class="p-3 text-gray-800 font-semibold">{{ $t->kode }}</td>
                <td class="p-3 text-gray-700">{{ $t->pelanggan->nama ?? '-' }}</td>
                <td class="p-3 text-gray-700">{{ $t->layanan->nama ?? '-' }}</td>
                <td class="p-3 text-gray-700">{{ number_format($t->berat, 2, ',', '.') }} Kg</td>
                <td class="p-3 text-gray-800 font-semibold">Rp {{ number_format($t->total, 0, ',', '.') }}</td>

                {{-- STATUS BADGE --}}
                <td class="p-3">
                    @php
                        $status = strtolower($t->status);
                    @endphp
                    @if($status == 'baru')
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold shadow-sm">🕓 Baru</span>
                    @elseif($status == 'proses')
                        <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-sm font-semibold shadow-sm">🔧 Proses</span>
                    @elseif($status == 'selesai')
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold shadow-sm">✅ Selesai</span>
                    @elseif($status == 'diambil')
                        <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-semibold shadow-sm">📦 Diambil</span>
                    @else
                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm font-semibold shadow-sm">{{ ucfirst($t->status) }}</span>
                    @endif
                </td>

                {{-- AKSI --}}
                <td class="p-3 flex items-center gap-3">
                    <a href="{{ route('transaksi.edit', $t) }}" 
                       class="text-yellow-600 hover:text-yellow-700 font-semibold transition">✏️ Ubah Status</a>

                    @if(Route::has('transaksi.show'))
                        <a href="{{ route('transaksi.show', $t) }}" 
                           class="text-indigo-600 hover:text-indigo-800 font-semibold transition">🔍 Detail</a>
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="p-4 text-center text-gray-500 italic">Belum ada transaksi yang tercatat.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-6 flex justify-center">
        {{ $transaksis->links() }}
    </div>
</div>
@endsection
