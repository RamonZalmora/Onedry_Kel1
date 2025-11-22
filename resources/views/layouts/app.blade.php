<<<<<<< HEAD
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OneDry - Sistem Laundry</title>

    <!-- ✅ Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#7e22ce',
                        secondary: '#9333ea',
                        accent: '#c084fc',
                        sidebar: '#faf5ff',
                    }
                }
            }
        }
    </script>

    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
        }
        .shadow-soft {
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        }
        .menu-active {
            background: linear-gradient(to right, #7e22ce, #9333ea);
            color: white !important;
        }
        .menu-active:hover {
            background: linear-gradient(to right, #6b21a8, #7e22ce);
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800 flex min-h-screen">

    <!-- 🌈 Sidebar -->
    <aside class="w-72 bg-gradient-to-b from-purple-700 via-purple-800 to-indigo-900 text-white flex flex-col shadow-lg">
        <!-- Header Logo -->
        <div class="flex items-center gap-3 p-6 border-b border-purple-500/40 bg-purple-800/40">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12 w-12 object-contain drop-shadow-md">
            <div>
                <h1 class="text-2xl font-bold">OneDry</h1>
                <p class="text-xs text-purple-200">Sistem Laundry</p>
            </div>
        </div>

        <!-- Menu Navigasi -->
        <nav class="flex-1 p-4 space-y-2 text-sm font-medium">
            <a href="{{ route('dashboard') }}" class="block py-2 px-4 rounded-md transition-all duration-150 hover:bg-purple-600/40 {{ request()->routeIs('dashboard') ? 'menu-active' : '' }}">
                🏠 Dashboard
            </a>
            <a href="{{ route('pelanggan.index') }}" class="block py-2 px-4 rounded-md transition-all duration-150 hover:bg-purple-600/40 {{ request()->routeIs('pelanggan.*') ? 'menu-active' : '' }}">
                👥 Pelanggan
            </a>
            <a href="{{ route('layanan.index') }}" class="block py-2 px-4 rounded-md transition-all duration-150 hover:bg-purple-600/40 {{ request()->routeIs('layanan.*') ? 'menu-active' : '' }}">
                ⚙️ Layanan
            </a>
            <a href="{{ route('transaksi.index') }}" class="block py-2 px-4 rounded-md transition-all duration-150 hover:bg-purple-600/40 {{ request()->routeIs('transaksi.*') ? 'menu-active' : '' }}">
                💸 Transaksi
            </a>
            <a href="{{ route('laporan.index') }}" class="block py-2 px-4 rounded-md transition-all duration-150 hover:bg-purple-600/40 {{ request()->routeIs('laporan.*') ? 'menu-active' : '' }}">
                📊 Laporan
            </a>

            @if(auth()->user()->role == 'owner')
                <a href="{{ route('pengaturan.index') }}" class="block py-2 px-4 rounded-md transition-all duration-150 hover:bg-purple-600/40 {{ request()->routeIs('pengaturan.*') ? 'menu-active' : '' }}">
                    🧑‍💼 Pengaturan
                </a>
            @endif

            <a href="{{ route('profile.show') }}" class="block py-2 px-4 rounded-md transition-all duration-150 hover:bg-purple-600/40 {{ request()->routeIs('profile.show') ? 'menu-active' : '' }}">
                👤 Profil Saya
            </a>
        </nav>

        <!-- Footer Sidebar -->
        <div class="p-4 border-t border-purple-500/40 bg-purple-900/30 text-purple-100">
            <p class="text-xs mb-2">Masuk sebagai:</p>
            <p class="font-semibold text-white">{{ auth()->user()->name }}</p>

            <form method="POST" action="{{ route('logout') }}" class="mt-4">
                @csrf
                <button type="submit" class="w-full py-2 bg-red-500 hover:bg-red-600 text-white text-sm rounded-md transition shadow">
                    🔴 Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- 🧾 Konten Utama -->
    <main class="flex-1 p-8 bg-gray-50">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-3xl font-bold text-gray-800">@yield('title', 'Dashboard')</h2>
            <div class="flex items-center gap-3">
                <div class="h-10 w-10 rounded-full bg-gradient-to-r from-purple-400 to-indigo-500 flex items-center justify-center text-white font-bold uppercase shadow-md">
                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-2 mb-4 rounded shadow-soft">
                {{ session('success') }}
            </div>
        @endif

        <div class="animate-fade-in">
            @yield('content')
        </div>
    </main>

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fadeIn 0.4s ease-out;
        }
    </style>
</body>
</html>
=======
<!--
=========================================================
* Soft UI Dashboard - v1.0.3
=========================================================

* Product Page: https://www.creative-tim.com/product/soft-ui-dashboard
* Copyright 2021 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>

@if (\Request::is('rtl'))
<html dir="rtl" lang="ar">
@else
<html lang="en">
@endif

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  @if (env('IS_DEMO'))
  <x-demo-metas></x-demo-metas>
  @endif

  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/kecil.png">
  <title>
    ONEDRY - Laundry Management
  </title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    * {
      font-family: 'Poppins', sans-serif !important;
    }
  </style>

  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100 {{ (\Request::is('rtl') ? 'rtl' : (Request::is('virtual-reality') ? 'virtual-reality' : '')) }} ">
  @yield('auth')
  @yield('guest')

  @if(session()->has('success'))
  <div x-data="{ show: true}"
    x-init="setTimeout(() => show = false, 4000)"
    x-show="show"
    class="position-fixed bg-success rounded right-3 text-sm py-2 px-4">
    <p class="m-0">{{ session('success')}}</p>
  </div>
  @endif
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/fullcalendar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  @stack('rtl')
  @stack('dashboard')
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>
>>>>>>> e4a0c53a79b5a34b9b0b79a9bc35d2252b30c210
