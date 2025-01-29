<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - HummaCar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>


<body class="bg-gray-100 flex items-center justify-center w-screen h-screen">

    {{-- <div class="flex-1 p-8 lg:p-12"> --}}


    <div class="bg-white rounded-lg shadow-lg w-full h-full flex overflow-hidden">

        <!-- Bagian Kiri: Ilustrasi -->
        <div class="hidden lg:flex flex-1 flex-col justify-center items-center bg-blue-100 p-8">
            <h3 class="text-3xl font-bold text-gray-700 mt-4">Selamat Datang Di <span class="text-blue-600">HummaCar</span></h3>
            <img src="{{asset('Car rental-pana.svg')}}" alt="Car-Rental" class="w-3/4">
        </div>

        <!-- Bagian Kanan: Form Login -->
        <div class="flex-1 p-8 lg:p-12">
        <div class="card">
        <div class="flex-1 p-8 lg:p-12">
            @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            @foreach ($errors->all() as $error)
                <span class="block sm:inline">{{ $error }}</span>
            @endforeach
        </div>
        @endif
            <h2 class="text-3xl font-bold text-gray-800 text-center " style="margin-top: 90px">Masuk</h2>
            <form method="POST" action="{{ route('login') }}" class="mt-6">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-600 font-medium mb-2">Alamat Email</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        placeholder="Masukkan email"
                        class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>
                <div class="mb-4 relative">
                    <label for="password" class="block text-gray-600 font-medium mb-2">Kata Sandi</label>
                    <div class="relative">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Masukkan password"
                            class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none pr-12"
                            required>
                            <button type="button"
                            onclick="togglePassword('password', this)"
                            class="absolute inset-y-0 right-0 flex items-center pr-4">
                            <svg class="h-5 w-5 text-gray-500 transition-transform duration-300 transform" xmlns="http://www.w3.org/2000/svg" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <!-- Ikon mata tertutup -->
                                <path class="icon-eye-closed" d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
                                <path class="icon-eye-closed" d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"></path>
                                <path class="icon-eye-closed" d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"></path>
                                <line class="icon-eye-closed" x1="2" x2="22" y1="2" y2="22"></line>
                                <!-- Ikon mata terbuka -->
                                <path class="icon-eye-open hidden" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                <circle class="icon-eye-open hidden" cx="12" cy="12" r="3"></circle>
                            </svg>
                        </button>
                    </div>
                </div>


                <div class="flex items-center justify-between mb-4">
                    <label class="inline-flex items-center text-gray-600">
                        <input type="checkbox" class="form-checkbox text-blue-500">
                        <span class="ml-2">Ingat saya</span>
                    </label>
                    <a href="#" class="text-blue-500 hover:underline">Lupa Kata Sandi?</a>
                </div>
                <button
                    type="submit"
                    class="w-full bg-blue-500 text-white py-3 rounded-lg font-medium hover:bg-blue-600 transition duration-300">
                    Masuk
                </button>
            </form>
            <p class="text-center text-gray-600 mt-4">
                Tidak punya akun?
                <a href="{{ route('register') }}" class="text-blue-500 hover:underline">Daftar</a>
            </p>
        </div>
        </div>
    </div>
    <script>
        function togglePassword(inputId, button) {
    const input = document.getElementById(inputId);
    const svg = button.querySelector('svg');
    const closedIcons = svg.querySelectorAll('.icon-eye-closed');
    const openIcons = svg.querySelectorAll('.icon-eye-open');

    // Toggle password visibility
    if (input.type === 'password') {
        input.type = 'text';
        closedIcons.forEach(icon => icon.classList.add('hidden'));
        openIcons.forEach(icon => icon.classList.remove('hidden'));
        svg.classList.add('rotate-180'); // Add rotation animation
    } else {
        input.type = 'password';
        closedIcons.forEach(icon => icon.classList.remove('hidden'));
        openIcons.forEach(icon => icon.classList.add('hidden'));
        svg.classList.remove('rotate-180'); // Reverse rotation
    }
}


        </script>

</body>
</html>
