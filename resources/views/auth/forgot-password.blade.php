<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lupa Password - OneDry</title>

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen bg-gradient-to-br from-purple-100 via-indigo-100 to-white flex items-center justify-center px-4">

    <div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8 border-t-4 border-purple-500 animate-fade-in">
        <div class="flex flex-col items-center mb-6">
            <img src="{{ asset('images/logo.png') }}" alt="OneDry Logo" class="h-20 w-20 object-contain drop-shadow-md">
        </div>

        <h2 class="text-center text-2xl font-bold text-purple-700 mb-4">Lupa Password</h2>
        <p class="text-center text-gray-600 text-sm mb-6">
            Masukkan email akun Anda, kami akan kirimkan link reset password.
        </p>

        <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" type="email" name="email" required
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 sm:text-sm">
            </div>

            <button type="submit"
                    class="w-full py-2 px-4 bg-gradient-to-r from-purple-600 to-indigo-600 text-white font-semibold rounded-md hover:scale-[1.02] transition-transform shadow-md">
                Kirim Link Reset
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-500">
            <a href="{{ route('login') }}" class="text-purple-600 hover:underline font-medium">← Kembali ke Login</a>
        </p>
    </div>
</body>
</html>
