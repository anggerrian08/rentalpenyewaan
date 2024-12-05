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
   <div id="step-1" class="bg-white rounded-lg shadow-lg w-full h-full flex overflow-hidden">
    <!-- Kolom Kiri -->
    <div class="w-1/2 bg-blue-50 px-8 flex flex-col justify-center h-full py-16">
        <h1 class="text-3xl font-bold text-gray-800 leading-snug text-center">
            Selamat Datang Di <span class="text-blue-500">HummaCar</span>
        </h1>
        <div class="space-y-4 mt-3 flex flex-col items-center">
            <ul class="space-y-4 mt-8 flex flex-col items-start">
            <li class="flex items-center space-x-3">
                <div class="flex items-center justify-center w-10 h-10 border border-gray-400 bg-white text-black font-bold rounded-full">
                    1
                </div>
                <p class="text-black text-lg font-medium">Apa saja data pribadimu?</p>
            </li>
            <li class="flex items-center space-x-3">
                <div class="flex items-center justify-center w-10 h-10 border border-gray-300 bg-gray-300 text-black font-bold rounded-full">
                    2
                </div>
                <p class="text-black text-lg font-medium">Dokumenmu apa sudah lengkap?</p>
            </li>
            <li class="flex items-center space-x-3">
                <div class="flex items-center justify-center w-10 h-10 border border-gray-300 bg-gray-300 text-black font-bold rounded-full">
                    3
                </div>
                <p class="text-black text-lg font-medium">Buat akunmu!</p>
            </li>
        </ul></div>

        <div class="mt-12 flex justify-center">
            <img src="{{asset('Car rental-pana.svg')}}" alt="Illustration" class="w-3/4">
        </div>
    </div>

    <!-- Kolom Kanan -->
    <div class="w-1/2 p-8 flex flex-col justify-center h-full">
        <h2 class="text-3xl font-bold text-gray-800 leading-snug text-center">Apa Saja Data Pribadimu?</h2>
        <form class="space-y-6">
            <div class="space mt-8 grid grid-cols-2 gap-4">
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" id="nama" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Masukkan nama lengkap">
                </div>
                <div>
                    <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                    <input type="text" id="nik" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Masukkan NIK">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="tanggal" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                    <input type="date" id="tanggal" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                </div>
                <div>
                    <label for="no_hp" class="block text-sm font-medium text-gray-700">No HP</label>
                    <input type="text" id="no_hp" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Masukkan no HP">
                </div>
            </div>
            <div>
                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis Kelamin</label>
                <select id="jenis_kelamin" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                    <option>Laki-laki</option>
                    <option>Perempuan</option>
                </select>
            </div>
            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <textarea id="alamat" class="mt-1 block w-full border border-gray-300 rounded-md p-2" rows="3" placeholder="Masukkan alamat"></textarea>
            </div>
            <div class="flex justify-end">
                <button type="button" id="btn-next-1" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600">
                    Selanjutnya →
                </button>
            </div>
        </form>
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
                    <div class="flex items-center justify-center w-10 h-10 border border-sky-400 bg-white text-sky-400 font-bold rounded-full">
                        1
                    </div>
                    <p class="text-sky-400 text-lg font-medium">Apa saja data pribadimu?</p>
                </li>
                <li class="flex items-center space-x-3">
                    <div class="flex items-center justify-center w-10 h-10 border border-gray-400 bg-white text-black font-bold rounded-full">
                        2
                    </div>
                    <p class="text-black text-lg font-medium">Dokumenmu apa sudah lengkap?</p>
                </li>
                <li class="flex items-center space-x-3">
                    <div class="flex items-center justify-center w-10 h-10 border border-gray-300 bg-gray-300 text-black font-bold rounded-full">
                        3
                    </div>
                    <p class="text-black text-lg font-medium">Buat akunmu!</p>
                </li>
            </ul>
        </div>
        <div class="mt-12 flex justify-center">
            <img src="{{asset('Car rental-pana.svg')}}" alt="Illustration" class="w-3/4">
        </div>
    </div>

    <!-- Kolom Kanan Langkah 2 -->
    <div class="w-1/2 p-8 flex flex-col justify-center h-full">
        <h2 class="text-3xl font-bold text-gray-800 leading-snug text-center">Dokumenmu apa sudah lengkap?</h2>
        <form class="space-y-6">
            <div class="space mt-8 grid grid-cols-2 gap-4">
                <div>
                    <label for="pas_foto" class="block text-sm font-medium text-gray-700 mb-2">
                        Pas Foto <span class="text-red-500">*</span>
                    </label>
                    <div class="relative group">
                        <input type="file" id="pas_foto" class="hidden" />
                        <label for="pas_foto" class="flex items-center justify-center w-full p-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-600 cursor-pointer group-hover:bg-blue-500 group-hover:text-white transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 16v-4a4 4 0 014-4h10a4 4 0 014 4v4M7 16v4h10v-4M7 8h10m-5 12h.01" />
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
                        <input type="file" id="ktp" class="hidden" />
                        <label for="ktp" class="flex items-center justify-center w-full p-3 border border-gray-300 rounded-lg bg-gray-50 text-gray-600 cursor-pointer group-hover:bg-blue-500 group-hover:text-white transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 16v-4a4 4 0 014-4h10a4 4 0 014 4v4M7 16v4h10v-4M7 8h10m-5 12h.01" />
                            </svg>
                            <span id="file-name-ktp" class="block text-sm text-gray-500">Choose File</span>
                        </label>
                    </div>
                </div>

                <div class="row p-2">
                   <div class="col-md-12">
                     <label for="sim" class="block text-sm font-medium text-gray-700 mb-2 ">
                        SIM <span class="text-red-500">*</span>
                    </label>
                    <div class="relative group">
                        <input type="file" id="sim" class="hidden" />
                        <label for="sim" class="flex items-center justify-center w-full p-4 border border-gray-300 rounded-lg bg-gray-50 text-gray-600 cursor-pointer group-hover:bg-blue-500 group-hover:text-white transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 group-hover:text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 16v-4a4 4 0 014-4h10a4 4 0 014 4v4M7 16v4h10v-4M7 8h10m-5 12h.01" />
                            </svg>
                            <span id="file-name-sim" class="block text-sm text-gray-500">Choose File</span>
                        </label>
                    </div>
                   </div>
                </div>
            </div>


            <div class="flex justify-between">
                <button type="button" id="btn-prev-1" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-400">
                    ← Sebelumnya
                </button>
                <button type="button" id="btn-next-2" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600">
                    Selanjutnya →
                </button>
            </div>
        </form>
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
                    <div class="flex items-center justify-center w-10 h-10 border border-sky-400 bg-white text-sky-400 font-bold rounded-full">
                        1
                    </div>
                    <p class="text-sky-400 text-lg font-medium">Apa saja data pribadimu?</p>
                </li>
                <li class="flex items-center space-x-3">
                    <div class="flex items-center justify-center w-10 h-10 border border-sky-400 bg-white text-sky-400 font-bold rounded-full">
                        2
                    </div>
                    <p class="text-sky-400 text-lg font-medium">Dokumenmu apa sudah lengkap?</p>
                </li>
                <li class="flex items-center space-x-3">
                    <div class="flex items-center justify-center w-10 h-10 border border-gray-300 bg-white text-black font-bold rounded-full">
                        3
                    </div>
                    <p class="text-black text-lg font-medium">Buat akunmu!</p>
                </li>
            </ul>
        </div>

        <div class="mt-12 flex justify-center">
            <img src="{{asset('Car rental-pana.svg')}}" alt="Illustration" class="w-3/4">
        </div>
    </div>

    <!-- Kolom Kanan -->
    <div class="w-1/2 p-8 flex flex-col justify-center h-full">
        <h2 class="text-3xl font-bold text-gray-800 leading-snug text-center">Buat akunmu!</h2>
        <form class="space-y-6">
            <div class="space mt-8 grid grid-cols-2 gap-4">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" name="username" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Masukkan nama lengkap">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Masukkan NIK">
                </div>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Masukkan Password">
                </div>
                <div>
                    <label for="konfirmasi_password" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    <input type="password" id="konfirmasi_password" name="password_confirm" class="mt-1 block w-full border border-gray-300 rounded-md p-2" placeholder="Konfirmasi Password">
                </div>
            </div>

            <div class="flex justify-between mt-6">
                <button type="button" id="btn-prev-2" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-md hover:bg-gray-400">
                    ← Sebelumnya
                </button>
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded-md hover:bg-blue-600">
                    Submit →
                </button>
            </div>
        </form>
    </div>
</div>


<script>
    // Step 1 -> Step 2
    const btnNext1 = document.getElementById('btn-next-1');
    const step1 = document.getElementById('step-1');
    const step2 = document.getElementById('step-2');

    btnNext1.addEventListener('click', () => {
        const nama = document.querySelector('#nama').value;
        const nik = document.querySelector('#nik').value;

        step1.classList.add('hidden');
        step2.classList.remove('hidden');
    });

    // Step 2 -> Step 3
    const btnNext2 = document.getElementById('btn-next-2');
    const step3 = document.getElementById('step-3');

    btnNext2.addEventListener('click', () => {
        step2.classList.add('hidden');
        step3.classList.remove('hidden');
    });

    // Step 1 <- Step 2
    const btnPrev1 = document.getElementById('btn-prev-1');

    btnPrev1.addEventListener('click', () => {
        step2.classList.add('hidden');
        step1.classList.remove('hidden');
    });

    // Step 2 <- Step 3
    const btnPrev2 = document.getElementById('btn-prev-2');

    btnPrev2.addEventListener('click', () => {
        step3.classList.add('hidden');
        step2.classList.remove('hidden');
    });

    // Handle file input for pas_foto and ktp
    document.querySelector('#pas_foto').addEventListener('change', function () {
        const fileName = this.files[0].name;
        document.querySelector('#file-name-pas_foto').textContent = fileName;
    });

    document.querySelector('#ktp').addEventListener('change', function () {
        const fileName = this.files[0].name;
        document.querySelector('#file-name-ktp').textContent = fileName;
    });

    document.querySelector('#sim').addEventListener('change', function () {
        const fileName = this.files[0].name;
        document.querySelector('#file-name-sim').textContent = fileName;
    });

</script>

</body>
</html>
