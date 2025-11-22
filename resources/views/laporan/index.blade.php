@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-extrabold bg-gradient-to-r from-purple-600 to-indigo-600 bg-clip-text text-transparent">
        📊 Laporan Penjualan
    </h1>
    <div class="flex gap-3">
        <a href="{{ route('laporan.pdf') }}" 
           class="bg-gradient-to-r from-red-500 to-red-600 text-white font-semibold px-5 py-2.5 rounded-lg shadow-md hover:shadow-lg hover:scale-105 transition-transform duration-200">
            ⬇️ Export PDF
        </a>
        <a href="{{ route('laporan.excel') }}" 
           class="bg-gradient-to-r from-green-500 to-emerald-600 text-white font-semibold px-5 py-2.5 rounded-lg shadow-md hover:shadow-lg hover:scale-105 transition-transform duration-200">
            📈 Export Excel
        </a>
    </div>
</div>

<div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100">
    <table class="w-full border-collapse overflow-hidden rounded-lg">
        <thead class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white">
            <tr>
                <th class="p-3 text-left font-semibold">Kode</th>
                <th class="p-3 text-left font-semibold">Pelanggan</th>
                <th class="p-3 text-left font-semibold">Layanan</th>
                <th class="p-3 text-left font-semibold">Total</th>
                <th class="p-3 text-left font-semibold">Status</th>
                <th class="p-3 text-left font-semibold">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transaksis as $t)
            <tr class="border-b hover:bg-purple-50 transition">
                <td class="p-3 text-gray-800 font-semibold">{{ $t->kode }}</td>
                <td class="p-3 text-gray-700">{{ $t->pelanggan->nama ?? '-' }}</td>
                <td class="p-3 text-gray-700">{{ $t->layanan->nama ?? '-' }}</td>
                <td class="p-3 text-gray-800 font-semibold">Rp {{ number_format($t->total, 0, ',', '.') }}</td>

                {{-- Status Badge --}}
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

                <td class="p-3 text-gray-600">{{ $t->created_at->format('d M Y - H:i') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="p-4 text-center text-gray-500 italic">Belum ada data transaksi untuk laporan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
