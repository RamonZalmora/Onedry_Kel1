<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - OneDry</title>

    <!-- ✅ Tailwind CDN (tanpa npm run dev) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#7e22ce',
                        secondary: '#9333ea',
                        accent: '#c084fc',
                    }
                }
            }
        }
    </script>
</head>

<body class="min-h-screen bg-gradient-to-br from-purple-100 via-indigo-100 to-white flex items-center justify-center px-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8 border-t-4 border-purple-500 animate-fade-in">
        
        <!-- Logo -->
        <div class="flex flex-col items-center mb-6">
            <img src="{{ asset('images/logo.png') }}" alt="OneDry Logo" class="h-20 w-20 object-contain drop-shadow-md">
            <p class="text-sm text-gray-500 mt-2">Sistem Laundry</p>
        </div>

        <!-- Judul -->
        <h2 class="text-center text-2xl font-bold text-purple-700 mb-8">Masuk ke Akun Anda</h2>

        <!-- Form -->
        <form method="POST" action="{{ route('login') }}" class="space-y-5">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" type="password" name="password" required
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember + Forgot -->
            <div class="flex items-center justify-between">
                <label class="flex items-center text-sm text-gray-600">
                    <input type="checkbox" name="remember" class="rounded text-purple-600 border-gray-300 focus:ring-purple-500">
                    <span class="ml-2">Ingat saya</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-purple-600 hover:underline">
                        Lupa Password?
                    </a>
                @endif
            </div>

            <!-- Tombol Login -->
            <div>
                <button type="submit"
                        class="w-full py-2 px-4 bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-semibold rounded-md hover:scale-[1.02] transition-transform shadow-md">
                    Masuk
                </button>
            </div>
        </form>

        <!-- Daftar -->
        <p class="mt-6 text-center text-sm text-gray-500">
            Belum punya akun?
            <a href="{{ route('register') }}" class="text-purple-600 hover:underline font-medium">Daftar Sekarang</a>
        </p>
    </div>

    <!-- Animasi -->
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fadeIn 0.6s ease-out;
        }
    </style>
</body>
</html>
