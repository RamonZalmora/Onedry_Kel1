@extends('layouts.app')

@section('content')

<!-- HEADER -->
<div class="bg-gradient-to-r from-purple-600 to-indigo-600 p-6 rounded-2xl shadow-md mb-8 text-white flex items-center justify-between">

    <div>
        <h1 class="text-3xl font-extrabold tracking-tight">OneDry Management Panel</h1>
        <p class="text-sm text-purple-200 mt-1">Ringkasan operasional harian & metrik</p>
    </div>

    <div class="flex items-center gap-4">

        <!-- WEATHER WIDGET -->
        <div class="bg-white/10 p-3 rounded-lg text-sm">
            <div class="text-xs text-gray-200">Pekanbaru</div>
            <div id="weather_temp" class="font-bold text-lg">-- °C</div>
            <div id="weather_wind" class="text-xs text-gray-300">-- km/h</div>
        </div>

        <!-- SERVER TIME -->
        <div class="bg-white/10 p-3 rounded-lg text-sm text-center">
            <div class="text-xs text-gray-200">Server</div>
            <div id="srv_time" class="font-bold text-lg">--:--:--</div>
            <div id="srv_date" class="text-xs text-gray-300">-- -- ----</div>
        </div>

        <a href="{{ route('transaksi.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white/20 hover:bg-white/30 rounded-lg font-semibold">
            ➕ Transaksi Baru
        </a>

        <a href="{{ route('pelanggan.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-white/10 hover:bg-white/20 rounded-lg border border-white/20 font-semibold">
            + Pelanggan
        </a>
    </div>

</div>

<!-- STATISTIK -->
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

    @php
        $stats = [
            ['icon' => '👥', 'label' => 'Total Pelanggan', 'value' => $totalPelanggan],
            ['icon' => '💸', 'label' => 'Transaksi Hari Ini', 'value' => $transaksiHariIni],
            ['icon' => '📈', 'label' => 'Pendapatan Mingguan', 'value' => $pendapatanMingguan],
            ['icon' => '📅', 'label' => 'Pendapatan Bulanan', 'value' => $pendapatanBulanan],
        ];
    @endphp

    @foreach($stats as $s)
    <div class="bg-white rounded-2xl shadow p-5">
        <div class="flex items-center">
            <div class="w-12 h-12 rounded-xl bg-indigo-500 text-white flex items-center justify-center text-lg">
                {{ $s['icon'] }}
            </div>
            <div class="ml-4">
                <div class="text-sm text-gray-500">{{ $s['label'] }}</div>
                <div class="text-3xl font-bold text-gray-900">
                    @if($s['label'] !== 'Total Pelanggan' && $s['label'] !== 'Transaksi Hari Ini')
                        Rp <span class="counter" data-target="{{ $s['value'] }}">0</span>
                    @else
                        <span class="counter" data-target="{{ $s['value'] }}">0</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div>

<!-- MAIN CONTENT -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <!-- Latest Transaksi -->
    <div class="lg:col-span-2 bg-white rounded-2xl shadow p-6">
        <h3 class="text-lg font-semibold mb-4">Transaksi Terbaru</h3>

        @if(count($latestTransaksis))
        <div class="divide-y">
            @foreach($latestTransaksis as $t)
            <div class="py-3 flex items-center justify-between">
                <div>
                    <div class="text-lg font-medium">{{ $t->kode ?? '#' . $t->id }}</div>
                    <div class="text-sm text-gray-500">
                        {{ $t->pelanggan->nama ?? 'Pelanggan' }} • 
                        <span class="text-indigo-600">{{ $t->status }}</span>
                    </div>
                </div>

                <div class="text-right">
                    <div class="font-semibold">Rp {{ number_format($t->total, 0, ',', '.') }}</div>
                    <div class="text-xs text-gray-500">{{ $t->created_at->format('d M H:i') }}</div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="text-center text-gray-400 py-10">Belum ada transaksi terbaru</div>
        @endif
    </div>

    <!-- REVENUE CHART -->
    <div class="bg-white rounded-2xl shadow p-6">
        <h3 class="text-lg font-semibold mb-4">Pendapatan 7 Hari Terakhir</h3>
        <canvas id="revenueChart" height="200"></canvas>
    </div>

</div>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {

    /* --- BASE URL FIX --- */
    let BASE_URL = window.location.origin;
    if (!BASE_URL.includes("8000")) BASE_URL = "http://127.0.0.1:8000";

    /* --- COUNTERS --- */
    document.querySelectorAll('.counter').forEach(counter => {
        const target = +counter.dataset.target || 0;
        let current = 0;
        const speed = 20;
        const formatter = new Intl.NumberFormat('id-ID');

        const interval = setInterval(() => {
            current += Math.ceil(target / 50);
            if (current >= target) {
                current = target;
                clearInterval(interval);
            }
            counter.textContent = formatter.format(current);
        }, speed);
    });

    /* --- WEATHER --- */
    async function loadWeather() {
        try {
            const res = await fetch(`${BASE_URL}/api/weather`);
            const data = await res.json();

            if (!data || data.error) return;

            document.getElementById('weather_temp').textContent = data.temperature + " °C";
            document.getElementById('weather_wind').textContent = "Angin " + data.windspeed + " km/h";
        } catch {}
    }

    /* --- SERVER TIME --- */
    async function loadServerTime() {
        try {
            const res = await fetch(`${BASE_URL}/api/server-time`);
            const data = await res.json();

            document.getElementById('srv_time').textContent = data.time;
            document.getElementById('srv_date').textContent = data.date;
        } catch {}
    }

    loadWeather();
    loadServerTime();
    setInterval(loadWeather, 30000);
    setInterval(loadServerTime, 1000);

    /* =============================
       REVENUE CHART FIXED
    ============================== */
    const revenueData = @json($dailyRevenue);

    const ctx = document.getElementById('revenueChart').getContext('2d');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
            datasets: [{
                label: 'Pendapatan (Rp)',
                data: revenueData,
                borderColor: 'rgb(79, 70, 229)',
                backgroundColor: 'rgba(79, 70, 229, 0.15)',
                borderWidth: 3,
                tension: 0.4,
                fill: true,
                pointRadius: 4,
                pointBackgroundColor: 'rgb(79, 70, 229)',
            }]
        },
        options: {
            scales: {
                y: {
                    ticks: {
                        callback: value => 'Rp ' + value.toLocaleString('id-ID')
                    }
                }
            },
            plugins: { legend: { display: false } }
        }
    });

});
</script>

@endsection
