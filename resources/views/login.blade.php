<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Akses Sistem</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white">
    <div class="h-screen flex items-center">
        <div class="flex flex-col md:flex-row bg-white shadow-none rounded-lg overflow-visible w-full">

            <!-- Left Side (Image) -->
            <div class="hidden md:flex w-1/2 bg-white items-center">
                <img src="{{ asset('img/loginPage.svg') }}" alt="Login Illustration" class="w-full object-contain">
            </div>

            <!-- Right Side (Form) -->
            <div class="w-full md:w-1/2 p-10 flex-items-center">
                <h2 class="text-4xl font-bold mb-4 text-black-800">Selamat Datang</h2>
                <p class="text-grey-600 mb-6">Silakan login menggunakan NIK dan Kata Sandi Anda untuk melanjutkan akses</p>

                @if(Session::has('error'))
                    <div class="mb-4 text-red-600 text-sm">
                        {{ Session::get('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ url('actionlogin') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">NIK/Username</label>
                        <input type="text" name="email" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan NIK/Username Anda">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Kata Sandi</label>
                        <input type="password" name="password" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Masukkan Kata Sandi Anda">
                    </div>

                    <div class="flex items-center justify-between mb-6">
                        <label class="flex items-center text-sm">
                            <input type="checkbox" class="form-checkbox text-blue-800 mr-2">
                            Ingat Saya
                        </label>
                        <a href="#" class="text-sm text-black-600 hover:underline">Lupa Kata Sandi?</a>
                    </div>

                    <button type="submit" class="w-full bg-blue-800 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-900 transition">
                        Masuk
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
