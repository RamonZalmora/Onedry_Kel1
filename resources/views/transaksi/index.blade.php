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
                <th class="p-3 text-left font-semibold">Tanggal</th>
                <th class="p-3 text-left font-semibold">Tanggal Diambil</th>
                <th class="p-3 text-left font-semibold w-40">Aksi</th>
            </tr>
        </thead>

        <tbody>
            @forelse($transaksis as $t)
            <tr class="border-b hover:bg-purple-50 transition">
                <td class="p-3 font-semibold text-gray-800">{{ $t->kode }}</td>
                <td class="p-3 text-gray-700">{{ $t->pelanggan->nama ?? '-' }}</td>
                <td class="p-3 text-gray-700">{{ $t->layanan->nama ?? '-' }}</td>
                <td class="p-3 text-gray-700">{{ number_format($t->berat, 2, ',', '.') }} Kg</td>
                <td class="p-3 font-semibold text-gray-800">
                    Rp {{ number_format($t->total, 0, ',', '.') }}
                </td>

                {{-- Status Badge --}}
                <td class="p-3">
                    @php $status = strtolower($t->status); @endphp

                    @if($status == 'baru')
                        <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-sm font-semibold">🕓 Baru</span>
                    @elseif($status == 'proses')
                        <span class="bg-indigo-100 text-indigo-700 px-3 py-1 rounded-full text-sm font-semibold">🔧 Proses</span>
                    @elseif($status == 'selesai')
                        <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-semibold">✅ Selesai</span>
                    @elseif($status == 'diambil')
                        <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-semibold">📦 Diambil</span>
                    @else
                        <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-full text-sm font-semibold">{{ ucfirst($t->status) }}</span>
                    @endif
                </td>

                <td class="p-3 text-gray-700">
                    {{ \Carbon\Carbon::parse($t->tanggal)->format('d M Y') }}
                </td>

                <td class="p-3 text-gray-700">
                    {{ $t->tanggal_diambil ? \Carbon\Carbon::parse($t->tanggal_diambil)->format('d M Y') : '-' }}
                </td>

                {{-- Tombol Aksi --}}
                <td class="p-3 flex items-center gap-2">

                    <!-- DETAIL -->
                    <a href="{{ route('transaksi.show', $t->id) }}" 
                       class="px-3 py-1 bg-indigo-500 text-white rounded-lg shadow hover:bg-indigo-600 transition">
                        🔍 Detail
                    </a>

                    <!-- HAPUS -->
                    <form action="{{ route('transaksi.destroy', $t->id) }}" 
                          method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus transaksi ini?')">
                        @csrf
                        @method('DELETE')

                        <button class="px-3 py-1 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition">
                            🗑️ Hapus
                        </button>
                    </form>

                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="p-4 text-center text-gray-500 italic">
                    Belum ada transaksi.
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-6 flex justify-center">
        {{ $transaksis->links() }}
    </div>
</div>
@endsection
