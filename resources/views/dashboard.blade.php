@extends('layouts.app')

@section('content')

<!-- 🔥 MODERN HEADER -->
<div class="bg-gradient-to-r from-purple-600 to-indigo-600 p-6 rounded-2xl shadow-md mb-8 text-white flex items-center justify-between">
    
    <div>
        <h1 class="text-3xl font-extrabold tracking-tight">OneDry Management Panel</h1>
        <p class="text-sm text-purple-200 mt-1">Ringkasan operasional harian & metrik </p>
    </div>

    <div class="flex items-center gap-3">
        <a href="{{ route('transaksi.create') }}" 
           class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 hover:bg-white/30 rounded-lg font-semibold shadow transition">
            <span class="text-lg">➕</span> Transaksi Baru
        </a>

        <a href="{{ route('pelanggan.create') }}" 
           class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 hover:bg-white/20 rounded-lg border border-white/20 font-semibold transition">
            + Pelanggan
        </a>
    </div>

</div>

<!-- 📊 STATISTIK -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

    <div class="bg-white rounded-2xl shadow p-5 transform hover:-translate-y-1 transition">
        <div class="flex items-center">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-blue-400 to-blue-600 flex items-center justify-center text-white shadow text-lg">👥</div>
            <div class="ms-4">
                <div class="text-sm text-gray-500">Total Pelanggan</div>
                <div class="text-3xl font-bold text-gray-900">
                    <span class="counter" data-target="{{ $totalPelanggan }}">0</span>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow p-5 transform hover:-translate-y-1 transition">
        <div class="flex items-center">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-teal-400 to-sky-500 flex items-center justify-center text-white shadow text-lg">💸</div>
            <div class="ms-4">
                <div class="text-sm text-gray-500">Transaksi Hari Ini</div>
                <div class="text-3xl font-bold text-gray-900">
                    <span class="counter" data-target="{{ $transaksiHariIni }}">0</span>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow p-5 transform hover:-translate-y-1 transition">
        <div class="flex items-center">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-emerald-400 to-green-600 flex items-center justify-center text-white shadow text-lg">📈</div>
            <div class="ms-4">
                <div class="text-sm text-gray-500">Pendapatan Mingguan</div>
                <div class="text-3xl font-bold text-gray-900">
                    Rp <span class="counter" data-target="{{ $pendapatanMingguan }}">0</span>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow p-5 transform hover:-translate-y-1 transition">
        <div class="flex items-center">
            <div class="w-12 h-12 rounded-xl bg-gradient-to-br from-indigo-400 to-indigo-600 flex items-center justify-center text-white shadow text-lg">📅</div>
            <div class="ms-4">
                <div class="text-sm text-gray-500">Pendapatan Bulanan</div>
                <div class="text-3xl font-bold text-gray-900">
                    Rp <span class="counter" data-target="{{ $pendapatanBulanan }}">0</span>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- 📌 MAIN CONTENT -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <!-- 🧾 Transaksi Terbaru -->
    <div class="lg:col-span-2 bg-white rounded-2xl shadow p-6">
        <h3 class="text-lg font-semibold mb-4">Transaksi Terbaru</h3>

        @if(isset($latestTransaksis) && count($latestTransaksis))
            <div class="divide-y">
                @foreach($latestTransaksis as $t)
                    <div class="py-3 flex items-center justify-between">
                        <div>
                            <div class="font-medium text-lg text-gray-800">
                                {{ $t->kode ?? ('#' . $t->id) }}
                            </div>
                            <div class="text-sm text-gray-500">
                                {{ $t->pelanggan->nama ?? 'Pelanggan' }} • 
                                <span class="text-indigo-600">{{ $t->status }}</span>
                            </div>
                        </div>

                        <div class="text-right">
                            <div class="font-semibold text-gray-900">
                                Rp {{ number_format($t->total ?? 0,0,',','.') }}
                            </div>
                            <div class="text-xs text-gray-400">
                                {{ $t->created_at->format('d M H:i') }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center text-gray-400 py-12">
                Belum ada transaksi terbaru — buat transaksi baru untuk melihat ringkasan di sini.
            </div>
        @endif
    </div>

    <!-- 📈 Revenue Chart -->
    <div class="bg-white rounded-2xl shadow p-6">
        <h3 class="text-lg font-semibold mb-4">Pendapatan 7 Hari Terakhir</h3>
        <div style="position: relative; height: 220px;">
            <canvas id="revenueChart"></canvas>
        </div>
    </div>

</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- ⚙️ Counter + Chart Script -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Counter animation
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
        const target = +counter.dataset.target || 0;
        let current = 0;
        const step = Math.max(Math.floor(900 / (target || 1)), 20);
        const formatter = new Intl.NumberFormat('id-ID');

        const timer = setInterval(() => {
            current += Math.ceil(target / (900 / step));
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            counter.textContent = formatter.format(current);
        }, step);
    });

    // Revenue chart
    const ctx = document.getElementById('revenueChart');

    if (ctx) {
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Sen','Sel','Rab','Kam','Jum','Sab','Min'],
                datasets: [{
                    label: 'Pendapatan (Rp)',
                    data: [
                        {{ $dailyRevenue[0] ?? 250000 }},
                        {{ $dailyRevenue[1] ?? 480000 }},
                        {{ $dailyRevenue[2] ?? 320000 }},
                        {{ $dailyRevenue[3] ?? 550000 }},
                        {{ $dailyRevenue[4] ?? 420000 }},
                        {{ $dailyRevenue[5] ?? 680000 }},
                        {{ $dailyRevenue[6] ?? 750000 }},
                    ],
                    borderColor: 'rgb(79, 70, 229)',
                    backgroundColor: 'rgba(79, 70, 229, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointRadius: 4,
                    pointBackgroundColor: 'rgb(79, 70, 229)'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false }},
                scales: {
                    y: {
                        ticks: {
                            callback: value => 'Rp ' + new Intl.NumberFormat('id-ID').format(value)
                        }
                    }
                }
            }
        });
    }
});
</script>

@endsection
