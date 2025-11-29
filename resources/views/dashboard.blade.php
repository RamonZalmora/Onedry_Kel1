@extends('layouts.app')

@section('content')

<!-- HEADER -->
<div class="relative p-6 rounded-3xl mb-8 bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 shadow-xl overflow-hidden">
    <div class="absolute inset-0 bg-white/10 backdrop-blur-xl rounded-3xl border border-white/20"></div>

    <div class="relative z-10 flex items-center justify-between">

        <div>
            <h1 class="text-3xl font-extrabold text-white drop-shadow">OneDry Dashboard</h1>
            <p class="text-purple-200 text-sm mt-1">Monitoring operasional laundry</p>
        </div>

        <div class="flex items-center gap-4">

            <!-- WEATHER -->
            <div class="px-3 py-2 bg-white/20 backdrop-blur-xl rounded-lg shadow border border-white/30 text-white">
                <div class="text-[10px] text-purple-100">Pekanbaru</div>
                <div id="weather_temp" class="font-bold text-base leading-4">-- °C</div>
                <div id="weather_wind" class="text-[10px] text-purple-200">-- km/h</div>
            </div>

            <!-- SERVER TIME -->
            <div class="px-3 py-2 bg-white/20 backdrop-blur-xl rounded-lg shadow border border-white/30 text-white text-center">
                <div class="text-[10px] text-purple-100">Server</div>
                <div id="srv_time" class="font-bold text-base">--:--:--</div>
                <div id="srv_date" class="text-[10px] text-purple-200">-- -- ----</div>
            </div>

            <!-- Buttons -->
            <a href="{{ route('transaksi.create') }}" class="bg-white text-purple-700 px-4 py-1.5 rounded-lg shadow font-semibold hover:scale-105 transition text-sm">
                ➕ Transaksi
            </a>

            <a href="{{ route('pelanggan.create') }}" class="bg-white/20 text-white px-4 py-1.5 rounded-lg border border-white/30 shadow hover:bg-white/30 transition text-sm">
                + Pelanggan
            </a>
        </div>

    </div>
</div>



<!-- STATISTICS (COMPACT) -->
<div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-8">

    @php
        $stats = [
            ['icon' => '👥', 'label' => 'Pelanggan', 'value' => $totalPelanggan, 'color'=>'from-blue-500 to-indigo-500'],
            ['icon' => '💸', 'label' => 'Hari Ini', 'value' => $transaksiHariIni, 'color'=>'from-purple-500 to-pink-500'],
            ['icon' => '📈', 'label' => 'Mingguan', 'value' => $pendapatanMingguan, 'color'=>'from-green-500 to-emerald-500'],
            ['icon' => '📅', 'label' => 'Bulanan', 'value' => $pendapatanBulanan, 'color'=>'from-orange-500 to-red-500'],
        ];
    @endphp

    @foreach($stats as $s)
    <div class="bg-white rounded-xl shadow p-4 border border-gray-100 hover:shadow-lg transition">

        <div class="flex items-center gap-3">

            <div class="h-10 w-10 rounded-xl bg-gradient-to-br {{ $s['color'] }} text-white flex items-center justify-center text-lg shadow-sm">
                {{ $s['icon'] }}
            </div>

            <div>
                <p class="text-[11px] text-gray-500">{{ $s['label'] }}</p>
                <p class="text-xl font-extrabold text-gray-900 leading-5 mt-1">
                    @if(in_array($s['label'], ['Mingguan', 'Bulanan']))
                        Rp <span class="counter" data-target="{{ $s['value'] }}">0</span>
                    @else
                        <span class="counter" data-target="{{ $s['value'] }}">0</span>
                    @endif
                </p>
            </div>

        </div>

    </div>
    @endforeach

</div>



<!-- MAIN CONTENT -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <!-- Latest Transactions (COMPACT TABLE) -->
    <div class="lg:col-span-2 bg-white rounded-2xl shadow p-5 border border-gray-100">

        <h3 class="text-lg font-bold text-gray-800 mb-3">🧾 Transaksi Terbaru</h3>

        @if(count($latestTransaksis))
        <div class="divide-y">

            @foreach($latestTransaksis as $t)
            <div class="py-2.5 flex items-center justify-between hover:bg-gray-50 transition px-2 rounded-lg">

                <div>
                    <p class="font-semibold text-gray-800 text-sm">{{ $t->kode }}</p>
                    <p class="text-xs text-gray-500">
                        {{ $t->pelanggan->nama }} 
                        <span class="text-indigo-600">• {{ ucfirst($t->status) }}</span>
                    </p>
                </div>

                <div class="text-right">
                    <p class="font-bold text-gray-900 text-sm">Rp {{ number_format($t->total,0,',','.') }}</p>
                    <p class="text-[10px] text-gray-400">{{ $t->created_at->format('d M H:i') }}</p>
                </div>

            </div>
            @endforeach

        </div>

        @else
        <div class="py-8 text-center text-gray-400 text-sm">Belum ada transaksi terbaru</div>
        @endif
    </div>



    <!-- Revenue Chart -->
    <div class="bg-white rounded-2xl shadow p-5 border border-gray-100">
        <h3 class="text-lg font-bold text-gray-800 mb-3">📈 Pendapatan 7 Hari</h3>
        <canvas id="revenueChart" height="170"></canvas>
    </div>

</div>



<!-- SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {

    /* COUNTER */
    document.querySelectorAll('.counter').forEach(counter => {
        const target = +counter.dataset.target;
        let current = 0;

        const update = () => {
            current += Math.ceil(target / 50);
            if (current >= target) current = target;
            counter.textContent = new Intl.NumberFormat('id-ID').format(current);
            if (current < target) setTimeout(update, 20);
        };
        update();
    });


    /* WEATHER */
    async function loadWeather() {
        try {
            const res = await fetch('/api/weather');
            const data = await res.json();
            document.getElementById('weather_temp').textContent = data.temperature + "°C";
            document.getElementById('weather_wind').textContent = data.windspeed + " km/h";
        } catch {}
    }


    /* SERVER TIME */
    async function loadTime() {
        try {
            const res = await fetch('/api/server-time');
            const data = await res.json();
            document.getElementById('srv_time').textContent = data.time;
            document.getElementById('srv_date').textContent = data.date;
        } catch {}
    }

    setInterval(loadTime, 1000);
    loadWeather();
    setInterval(loadWeather, 60000);


    /* CHART */
    const ctx = document.getElementById('revenueChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
            datasets: [{
                label: 'Pendapatan',
                data: @json($dailyRevenue),
                borderColor: '#6366f1',
                backgroundColor: 'rgba(99,102,241,0.15)',
                borderWidth: 2,
                tension: 0.4,
                fill: true,
                pointRadius: 3,
            }]
        },
        options: {
            plugins: { legend: { display: false }},
            scales: {
                y: { ticks: { callback: value => "Rp " + value.toLocaleString('id-ID') }}
            }
        }
    });

});
</script>

@endsection
