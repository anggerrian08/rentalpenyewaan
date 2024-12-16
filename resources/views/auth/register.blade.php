<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center w-screen h-screen">

    <!-- Kontainer Langkah 1 -->
    <div id="step-1" class="bg-white rounded-lg shadow-lg w-full h-full flex overflow-hidden"
        class="transition-all duration-500 ease-in-out ...">
        <!-- Kolom Kiri -->
        <div class="w-1/2 bg-blue-50 px-8 flex flex-col justify-center h-full py-16">
            <h1 class="text-3xl font-bold text-gray-800 leading-snug text-center">
                Selamat Datang Di <span class="text-blue-500">HummaCar</span>
            </h1>
            <div class="space-y-4 mt-3 flex flex-col items-center">
                <ul class="space-y-4 mt-8 flex flex-col items-start">
                    <li class="flex items-center space-x-3">
                        <div
                            class="flex items-center justify-center w-10 h-10 border border-gray-400 bg-white text-black font-bold rounded-full">
                            1
                        </div>
                        <p class="text-black text-lg font-medium">Apa saja data pribadimu?</p>
                    </li>
                    <li class="flex items-center space-x-3">
                        <div
                            class="flex items-center justify-center w-10 h-10 border border-gray-300 bg-gray-300 text-black font-bold rounded-full">
                            2
                        </div>
                        <p class="text-black text-lg font-medium">Dokumenmu apa sudah lengkap?</p>
                    </li>
                    <li class="flex items-center space-x-3">
                        <div
                            class="flex items-center justify-center w-10 h-10 border border-gray-300 bg-gray-300 text-black font-bold rounded-full">
                            3
                        </div>
                        <p class="text-black text-lg font-medium">Buat akunmu!</p>
                    </li>
                </ul>
            </div>

            <div class="mt-12 flex justify-center">
                <img src="{{ asset('Car rental-pana.svg') }}" alt="Illustration" class="w-3/4">
            </div>
        </div>


        <!-- Kolom Kanan -->
        <div class="w-1/2 p-8 flex flex-col justify-center h-full">
            <h2 class="text-3xl font-bold text-gray-800 leading-snug text-center">Apa Saja Data Pribadimu?</h2>
            <form method="POST" action="{{ route('register.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="space mt-8 grid grid-cols-2 gap-4">
                    <div>
                        <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                        <input type="text" id="nik" name="nik"
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Masukkan NIK">
                        @error('nik')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="no_hp" class="block text-sm font-medium text-gray-700">No HP</label>
                        <input type="text" id="no_hp" name="phone_number"
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                            placeholder="Masukkan no HP">
                        @error('no_hp')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                        <input type="date" id="tanggal" name="birt_date"
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2"
                            value="{{ old('birt_date') }}">
                        @error('tanggal')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                        <select id="jenis_kelamin" name="jk"
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                </div>
                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <textarea id="alamat" name="address" class="mt-1 block w-full border border-gray-300 rounded-md p-2" rows="3"
                        placeholder="Masukkan alamat"></textarea>
                    @error('alamat')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex justify-end">
                    <button type="button" id="btn-next-1"
                        class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 mt-4">
                        Selanjutnya →
                    </button>
                </div>

                {{-- </form> --}}
                <p class="text-center text-gray-600 mt-4">
                    Sudah punya akun?
                    <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Masuk</a>
                </p>
        </div>
    </div>

    <!-- Kontainer Langkah 2 -->
    <div id="step-2" class="bg-white rounded-lg shadow-lg w-full h-full flex overflow-hidden hidden">
        <div class="w-1/2 bg-blue-50 px-8 flex flex-col justify-center h-full py-16">
            <h1 class="text-3xl font-bold text-gray-800 leading-snug text-center">
                Selamat Datang Di <span class="text-blue-500">HummaCar</span>
            </h1>
            <div class="space-y-4 mt-3 flex flex-col items-center">
                <ul class="space-y-4 mt-8 flex flex-col items-start">
                    <li class="flex items-center space-x-3">
                        <div
                            class="flex items-center justify-center w-10 h-10 border border-sky-400 bg-white text-sky-400 font-bold rounded-full">
                            1
                        </div>
                        <p class="text-sky-400 text-lg font-medium">Apa saja data pribadimu?</p>
                    </li>
                    <li class="flex items-center space-x-3">
                        <div
                            class="flex items-center justify-center w-10 h-10 border border-gray-400 bg-white text-black font-bold rounded-full">
                            2
                        </div>
                        <p class="text-black text-lg font-medium">Dokumenmu apa sudah lengkap?</p>
                    </li>
                    <li class="flex items-center space-x-3">
                        <div
                            class="flex items-center justify-center w-10 h-10 border border-gray-300 bg-gray-300 text-black font-bold rounded-full">
                            3
                        </div>
                        <p class="text-black text-lg font-medium">Buat akunmu!</p>
                    </li>
                </ul>
            </div>
            <div class="mt-12 flex justify-center">
                <img src="{{ asset('Car rental-pana.svg') }}" alt="Illustration" class="w-3/4">
            </div>
        </div>

        <!-- Kolom Kanan Langkah 2 -->
        <div class="w-1/2 p-8 flex flex-col justify-center h-full">
            <h2 class="text-3xl font-bold text-gray-800 leading-snug text-center">Dokumenmu apa sudah lengkap?</h2>
            {{-- <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data"> --}}
            @csrf

            <div class="space mt-8 grid grid-cols-2 gap-4">
                <div>
                    <label for="pas_foto" class="block text-sm font-medium text-gray-700 mb-2">
                        Pas Foto <span class="text-red-500">*</span>
                    </label>
                    <div class="relative group">
                        <input type="file" id="pas_foto" name="photo" class="hidden" />
                        <label for="pas_foto"
                            class="flex items-center justify-center w-full p-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-600 cursor-pointer group-hover:bg-blue-500 group-hover:text-white transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:text-white"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 16v-4a4 4 0 014-4h10a4 4 0 014 4v4M7 16v4h10v-4M7 8h10m-5 12h.01" />
                            </svg>
                            <span id="file-name-pas_foto" class="block text-sm text-gray-500">Choose File</span>
                        </label>
                    </div>
                </div>

                <div>
                    <label for="ktp" class="block text-sm font-medium text-gray-700 mb-2">
                        KTP <span class="text-red-500">*</span>
                    </label>
                    <div class="relative group">
                        <input type="file" id="ktp" name="ktp" class="hidden" />
                        <label for="ktp"
                            class="flex items-center justify-center w-full p-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-600 cursor-pointer group-hover:bg-blue-500 group-hover:text-white transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:text-white"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 16v-4a4 4 0 014-4h10a4 4 0 014 4v4M7 16v4h10v-4M7 8h10m-5 12h.01" />
                            </svg>
                            <span id="file-name-ktp" class="block text-sm text-gray-500">Choose File</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="space mt-8 grid grid-cols-1 gap-4">
                <div class="row p-2">
                    <div class="col-md-12">
                        <label for="sim" class="block text-sm font-medium text-gray-700 mb-2">
                            SIM <span class="text-red-500">*</span>
                        </label>
                        <div class="relative group">
                            <input type="file" id="sim" name="sim" class="hidden" />
                            <label for="sim"
                                class="flex items-center justify-center w-full p-4 border border-gray-300 rounded-lg bg-gray-50 text-gray-600 cursor-pointer group-hover:bg-blue-500 group-hover:text-white transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:text-white"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 16v-4a4 4 0 014-4h10a4 4 0 014 4v4M7 16v4h10v-4M7 8h10m-5 12h.01" />
                                </svg>
                                <span id="file-name-sim" class="block text-sm text-gray-500">Choose File</span>
                            </label>
                        </div>
                    </div>
                </div>

            </div>

            <div class="flex justify-between">
                <button type="button" id="btn-prev-1"
                    class="bg-gray-300 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-400 mt-4">
                    ← Sebelumnya
                </button>
                <button type="button" id="btn-next-2"
                    class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 mt-4">
                    Selanjutnya →
                </button>
            </div>
            {{-- </form> --}}
            <p class="text-center text-gray-600 mt-4">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Daftar</a>
            </p>
        </div>
    </div>

    <div id="step-3" class="bg-white rounded-lg shadow-lg w-full h-full flex overflow-hidden hidden">
        <!-- Bagian Gambar -->
        <div class="w-1/2 bg-blue-50 px-8 flex flex-col justify-center h-full py-16">
            <h1 class="text-3xl font-bold text-gray-800 leading-snug text-center">
                Selamat Datang Di <span class="text-blue-500">HummaCar</span>
            </h1>
            <div class="space-y-4 mt-3 flex flex-col items-center">
                <ul class="space-y-4 mt-8 flex flex-col items-start">
                    <li class="flex items-center space-x-3">
                        <div
                            class="flex items-center justify-center w-10 h-10 border border-sky-400 bg-white text-sky-400 font-bold rounded-full">
                            1
                        </div>
                        <p class="text-sky-400 text-lg font-medium">Apa saja data pribadimu?</p>
                    </li>
                    <li class="flex items-center space-x-3">
                        <div
                            class="flex items-center justify-center w-10 h-10 border border-sky-400 bg-white text-sky-400 font-bold rounded-full">
                            2
                        </div>
                        <p class="text-sky-400 text-lg font-medium">Dokumenmu apa sudah lengkap?</p>
                    </li>
                    <li class="flex items-center space-x-3">
                        <div
                            class="flex items-center justify-center w-10 h-10 border border-gray-300 bg-white text-black font-bold rounded-full">
                            3
                        </div>
                        <p class="text-black text-lg font-medium">Buat akunmu!</p>
                    </li>
                </ul>
            </div>

            <div class="mt-12 flex justify-center">
                <img src="{{ asset('Car rental-pana.svg') }}" alt="Illustration" class="w-3/4">
            </div>
        </div>

        <!-- Kolom Kanan -->
        <div class="w-1/2 p-8 flex flex-col justify-center h-full">
            <h2 class="text-3xl font-bold text-gray-800 leading-snug text-center">Buat akunmu!</h2>
            {{-- <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data"> --}}
            @csrf
            <div class="space mt-8 grid grid-cols-2 gap-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="name" name="name"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <!-- Input Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password"
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2 pr-10">
                        <button type="button" onclick="togglePassword('password', this)"
                            class="absolute inset-y-0 right-0 flex items-center pr-4">
                            <svg class="h-4 w-4 text-gray-500 transition-transform duration-300 transform"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <!-- Ikon mata tertutup -->
                                <path class="icon-eye-closed" d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
                                <path class="icon-eye-closed"
                                    d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                                </path>
                                <path class="icon-eye-closed"
                                    d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"></path>
                                <line class="icon-eye-closed" x1="2" x2="22" y1="2"
                                    y2="22"></line>
                                <!-- Ikon mata terbuka -->
                                <path class="icon-eye-open hidden" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z">
                                </path>
                                <circle class="icon-eye-open hidden" cx="12" cy="12" r="3"></circle>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Input Konfirmasi Password -->
                <div>
                    <label for="konfirmasi_password" class="block text-sm font-medium text-gray-700">Konfirmasi
                        Password</label>
                    <div class="relative">
                        <input type="password" id="konfirmasi_password" name="password_confirmation"
                            class="mt-1 block w-full border border-gray-300 rounded-md p-2 pr-10">
                        <button type="button" onclick="togglePassword('konfirmasi_password', this)"
                            class="absolute inset-y-0 right-0 flex items-center pr-4">
                            <svg class="h-4 w-4 text-gray-500 transition-transform duration-300 transform"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2">
                                <!-- Ikon mata tertutup -->
                                <path class="icon-eye-closed" d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
                                <path class="icon-eye-closed"
                                    d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                                </path>
                                <path class="icon-eye-closed"
                                    d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"></path>
                                <line class="icon-eye-closed" x1="2" x2="22" y1="2"
                                    y2="22"></line>
                                <!-- Ikon mata terbuka -->
                                <path class="icon-eye-open hidden" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z">
                                </path>
                                <circle class="icon-eye-open hidden" cx="12" cy="12" r="3"></circle>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex justify-between">
                <button type="button" id="btn-prev-2"
                    class="bg-gray-300 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-400 mt-4">
                    ← Sebelumnya
                </button>
                <button type="button" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600 mt-4">
                    Daftar
                </button>
            </div>

            </form>
            <p class="text-center text-gray-600 mt-4">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Masuk</a>
            </p>
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

        document.addEventListener("DOMContentLoaded", function() {
            const steps = ["step-1", "step-2", "step-3"];
            let currentStepIndex = 0;

            const showStep = (index) => {
                steps.forEach((stepId, i) => {
                    const stepElement = document.getElementById(stepId);
                    stepElement.classList.toggle("hidden", i !== index);
                });
            };

            const validateStep1 = () => {
                const nik = document.getElementById("nik");
                const tanggal = document.getElementById("tanggal");
                const noHp = document.getElementById("no_hp");

                // Reset previous error states
                [nik, tanggal, noHp].forEach(el => el.classList.remove('border-red-500'));

                let isValid = true;
                .000000000000000000000000
                if (!nik.value.trim() || nik.value.length !== 16) {
                    nik.classList.add('border-red-500');
                    isValid = false;
                }

                if (!tanggal.value) {
                    tanggal.classList.add('border-red-500');
                    isValid = false;
                }

                if (!noHp.value.trim() || !/^[0-9]{10,13}$/.test(noHp.value)) {
                    noHp.classList.add('border-red-500');
                    isValid = false;
                }

                return isValid;
            };

            const validateStep2 = () => {
                const pasFoto = document.getElementById("pas_foto");
                const ktp = document.getElementById("ktp");
                const sim = document.getElementById("sim");

                [pasFoto, ktp, sim].forEach(el => el.parentElement.classList.remove('border-red-500'));

                let isValid = true;

                if (!pasFoto.files.length) {
                    pasFoto.parentElement.classList.add('border-red-500');
                    isValid = false;
                }

                if (!ktp.files.length) {
                    ktp.parentElement.classList.add('border-red-500');
                    isValid = false;
                }

                if (!sim.files.length) {
                    sim.parentElement.classList.add('border-red-500');
                    isValid = false;
                }

                return isValid;
            };

            const validateStep3 = () => {
                const username = document.getElementById("username");
                const email = document.getElementById("email");
                const password = document.getElementById("password");
                const konfirmasiPassword = document.getElementById("konfirmasi_password");

                [username, email, password, konfirmasiPassword].forEach(el => el.classList.remove(
                    'border-red-500'));

                let isValid = true;

                if (!username.value.trim()) {
                    username.classList.add('border-red-500');
                    isValid = false;
                }

                if (!email.value.trim() || !/\S+@\S+\.\S+/.test(email.value)) {
                    email.classList.add('border-red-500');
                    isValid = false;
                }

                if (password.value.length < 8) {
                    password.classList.add('border-red-500');
                    isValid = false;
                }

                if (password.value !== konfirmasiPassword.value) {
                    password.classList.add('border-red-500');
                    konfirmasiPassword.classList.add('border-red-500');
                    isValid = false;
                }

                return isValid;
            };

            // Next and Previous buttons for each step
            document.getElementById("btn-next-1").addEventListener("click", function(e) {
                if (validateStep1()) {
                    currentStepIndex = 1;
                    showStep(currentStepIndex);
                }
            });

            document.getElementById("btn-prev-1").addEventListener("click", function() {
                currentStepIndex = 0;
                showStep(currentStepIndex);
            });

            document.getElementById("btn-next-2").addEventListener("click", function(e) {
                if (validateStep2()) {
                    currentStepIndex = 2;
                    showStep(currentStepIndex);
                }
            });

            document.getElementById("btn-prev-2").addEventListener("click", function() {
                currentStepIndex = 1;
                showStep(currentStepIndex);
            });

            // Form submission validation
            document.querySelector('form').addEventListener('submit', function(e) {
                if (!validateStep3()) {
                    e.preventDefault();
                }
            });
        });
    </script>

</body>

</html>
