@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-6 text-purple-700">Detail Transaksi</h1>

<div class="bg-white shadow-lg rounded-xl p-6 border border-gray-200">

    {{-- HEADER --}}
    <h2 class="text-xl font-semibold mb-4">
        Transaksi: <span class="text-indigo-600 font-bold">{{ $transaksi->kode }}</span>
    </h2>

    {{-- GRID 2 KOLOM --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        {{-- KOLOM KIRI --}}
        <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
            <h3 class="text-lg font-bold mb-3">🧍 Data Pelanggan</h3>

            <div class="space-y-2 text-gray-700">
                <p><strong>Nama:</strong> {{ $transaksi->pelanggan->nama }}</p>
                <p><strong>No HP:</strong> {{ $transaksi->pelanggan->telepon }}</p>
                <p><strong>Alamat:</strong> {{ $transaksi->pelanggan->alamat }}</p>
            </div>

            {{-- STATUS --}}
            <div class="mt-5">
                <p class="font-bold text-gray-700 mb-1">Status</p>

                @php $s = $transaksi->status; @endphp

                @if($s == 'baru')
                    <span class="bg-yellow-200 text-yellow-800 px-3 py-1 rounded-full text-sm font-semibold">🕓 Baru</span>
                @elseif($s == 'proses')
                    <span class="bg-blue-200 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">🔧 Proses</span>
                @elseif($s == 'selesai')
                    <span class="bg-green-200 text-green-800 px-3 py-1 rounded-full text-sm font-semibold">✅ Selesai</span>
                @elseif($s == 'diambil')
                    <span class="bg-purple-200 text-purple-800 px-3 py-1 rounded-full text-sm font-semibold">📦 Diambil</span>
                @endif
            </div>

            {{-- FOTO --}}
            @if($transaksi->foto)
            <div class="mt-5">
                <p class="font-bold text-gray-700 mb-2">Foto Cucian</p>
                <img src="{{ asset('storage/'.$transaksi->foto) }}" 
                     class="rounded-lg shadow w-52 border border-gray-200">
            </div>
            @endif
        </div>

        {{-- KOLOM KANAN --}}
        <div class="bg-gray-50 p-5 rounded-lg border border-gray-200">
            <h3 class="text-lg font-bold mb-3">🧺 Detail Laundry</h3>

            <div class="space-y-2 text-gray-700">
                <p><strong>Layanan:</strong> {{ $transaksi->layanan->nama }}</p>
                <p><strong>Harga per Kg:</strong> Rp{{ number_format($transaksi->layanan->harga,0,',','.') }}</p>
                <p><strong>Berat:</strong> {{ number_format($transaksi->berat,2,',','.') }} kg</p>
                <p><strong>Total:</strong> 
                    <span class="font-bold text-indigo-600">
                        Rp{{ number_format($transaksi->total,0,',','.') }}
                    </span>
                </p>
                <p><strong>Kasir:</strong> {{ $transaksi->kasir }}</p>
            </div>
        </div>

    </div>

    {{-- FORM GANTI STATUS --}}
    <div class="mt-8">
        <h3 class="font-semibold text-gray-700 mb-2">Ubah Status Transaksi:</h3>

        <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST" class="flex gap-3">
            @csrf
            @method('PUT')

            <select name="status" class="p-2 border rounded-lg">
                @foreach($statuses as $status)
                    <option value="{{ $status }}" 
                        {{ $transaksi->status == $status ? 'selected' : '' }}>
                        {{ ucfirst($status) }}
                    </option>
                @endforeach
            </select>

            <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
                Update Status
            </button>
        </form>
    </div>

</div>
@endsection
