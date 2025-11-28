<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar - OneDry</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#7e22ce',
                        secondary: '#9333ea',
                        accent: '#c084fc',
                    },
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        .auth-bg {
            background-image: url("{{ asset('images/laundry_bg.jpg') }}");
            background-size: cover;
            background-position: center;
        }
        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: 95vh;
            max-width: 1200px;
            margin: 2rem auto;
            border: 1px solid #e9d5ff;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(192, 132, 252, 0.1);
        }
        @media (max-width: 768px) {
            .grid-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body class="font-sans">
    <div class="grid-container">
        <!-- Left Column -->
        <div class="hidden md:flex flex-col justify-between p-12 text-white relative overflow-hidden auth-bg">
            <div class="absolute inset-0 bg-black/60"></div>
            <div class="relative z-10">
                <img src="{{ asset('images/logo.png') }}" alt="OneDry Logo" class="h-12 w-auto mb-6 filter brightness-0 invert">
            </div>
            <div class="relative z-10">
                <h1 class="text-4xl font-bold mb-4 leading-tight">Selamat datang di aplikasi Onedry</h1>
                <p class="text-gray-200">Silahkan daftar untuk membuat akun baru</p>
            </div>
        </div>

        <!-- Right Column -->
        <div class="flex flex-col justify-center p-8 md:p-12 bg-white border-l border-purple-200">
            <div class="w-full max-w-md mx-auto">
                <!-- Mobile Logo -->
                <div class="flex flex-col items-center mb-8 md:hidden">
                    <img src="{{ asset('images/logo.png') }}" alt="OneDry Logo" class="h-16 w-auto mb-2 filter brightness-0 invert">
                    <p class="text-sm text-gray-500">Sistem Laundry</p>
                </div>

                <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">Daftar Akun Baru</h2>

                <form method="POST" action="{{ route('register') }}" class="space-y-6">
                    @csrf

                    <!-- Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                        <input id="password" type="password" name="password" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200">
                        @error('password')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                        <input id="password_confirmation" type="password" name="password_confirmation" required
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500 transition duration-200">
                    </div>

                    <!-- Register Button -->
                    <button type="submit" class="w-full bg-purple-600 text-white py-2.5 px-4 rounded-lg font-medium hover:bg-purple-700 transition duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        Daftar
                    </button>
                </form>

                <!-- Login Link -->
                <p class="mt-6 text-center text-sm text-gray-500">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="font-medium text-purple-600 hover:text-purple-500">Masuk disini</a>
                </p>
            </div>
        </div>
    </div>
</body>
</html>
