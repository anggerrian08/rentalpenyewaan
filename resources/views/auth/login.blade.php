<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - HummaCar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center w-screen h-screen">


    <div class="bg-white rounded-lg shadow-lg w-full h-full flex overflow-hidden">
        <!-- Bagian Kiri: Ilustrasi -->
        <div class="hidden lg:flex flex-1 flex-col justify-center items-center bg-blue-100 p-8">
            <h3 class="text-3xl font-bold text-gray-700 mt-4">Selamat Datang Di <span class="text-blue-600">HummaCar</span></h3>
            <img src="{{asset('Car rental-pana.svg')}}" alt="Car-Rental" class="w-3/4">
        </div>

        <!-- Bagian Kanan: Form Login -->
        <div class="flex-1 p-8 lg:p-12">
            <h2 class="text-3xl font-bold text-gray-800 text-center">Login</h2>
            <form method="POST" action="{{ route('login') }}" class="mt-6">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-600 font-medium mb-2">Email Address</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Masukkan email"
                        class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-600 font-medium mb-2">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        placeholder="Masukkan password"
                        class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>
                <div class="flex items-center justify-between mb-4">
                    <label class="inline-flex items-center text-gray-600">
                        <input type="checkbox" class="form-checkbox text-blue-500">
                        <span class="ml-2">Ingat saya</span>
                    </label>
                    <a href="#" class="text-blue-500 hover:underline">Lupa Password?</a>
                </div>
                <button
                    type="submit"
                    class="w-full bg-blue-500 text-white py-3 rounded-lg font-medium hover:bg-blue-600 transition duration-300">
                    Login
                </button>
            </form>
            <p class="text-center text-gray-600 mt-4">
                Tidak punya akun?
                <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Daftar</a>
            </p>
        </div>
    </div>


</body>
</html>
