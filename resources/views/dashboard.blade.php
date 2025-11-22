@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">

    <!-- HEADER -->
    <div class="bg-white rounded-lg shadow p-4 flex flex-col md:flex-row md:items-center md:justify-between">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-3">
                <span class="text-3xl">📊</span>
            </h1>
            <p class="text-sm text-gray-500 mt-1">
                Selamat datang, <span class="font-semibold text-purple-700">{{ Auth::user()->name ?? 'User' }}</span>
            </p>
        </div>

        <div class="mt-3 md:mt-0">
            <span class="inline-block bg-gradient-to-r from-purple-500 to-indigo-500 text-white px-3 py-1 rounded-lg text-sm shadow">
                {{ \Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
            </span>
        </div>
    </div>

    <!-- CARDS: 2 columns per row on sm+ screens -->
    <div class="flex flex-wrap -mx-3">
        <!-- Card 1 -->
        <div class="w-full sm:w-1/2 px-3 mb-6">
            <div class="bg-white rounded-lg shadow p-5 flex items-center justify-between border-t-4 border-purple-500">
                <div>
                    <p class="text-gray-500 text-sm">Total Pelanggan</p>
                    <div class="text-3xl font-bold text-gray-800 mt-2">
                        {{ $totalPelanggan ?? 0 }}
                    </div>
                </div>
                <div class="ml-4 flex-shrink-0">
                    <div class="bg-purple-100 text-purple-600 p-3 rounded-full">
                        👥
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="w-full sm:w-1/2 px-3 mb-6">
            <div class="bg-white rounded-lg shadow p-5 flex items-center justify-between border-t-4 border-indigo-500">
                <div>
                    <p class="text-gray-500 text-sm">Transaksi Hari Ini</p>
                    <div class="text-3xl font-bold text-gray-800 mt-2">
                        {{ $transaksiHariIni ?? 0 }}
                    </div>
                </div>
                <div class="ml-4 flex-shrink-0">
                    <div class="bg-indigo-100 text-indigo-600 p-3 rounded-full">
                        💸
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="w-full sm:w-1/2 px-3 mb-6">
            <div class="bg-white rounded-lg shadow p-5 flex items-center justify-between border-t-4 border-pink-500">
                <div>
                    <p class="text-gray-500 text-sm">Pendapatan Mingguan</p>
                    <div class="text-3xl font-bold text-gray-800 mt-2">
                        Rp {{ number_format($pendapatanMingguan ?? 0, 0, ',', '.') }}
                    </div>
                </div>
                <div class="ml-4 flex-shrink-0">
                    <div class="bg-pink-100 text-pink-600 p-3 rounded-full">
                        📅
                    </div>
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="w-full sm:w-1/2 px-3 mb-6">
            <div class="bg-white rounded-lg shadow p-5 flex items-center justify-between border-t-4 border-green-500">
                <div>
                    <p class="text-gray-500 text-sm">Pendapatan Bulanan</p>
                    <div class="text-3xl font-bold text-gray-800 mt-2">
                        Rp {{ number_format($pendapatanBulanan ?? 0, 0, ',', '.') }}
                    </div>
                </div>
                <div class="ml-4 flex-shrink-0">
                    <div class="bg-green-100 text-green-600 p-3 rounded-full">
                        💰
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
