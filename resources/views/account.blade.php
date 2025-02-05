<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<title>User Profile</title>
<style>
    body {
        background-color: #f4f8ff;
        color: #333;
    }

    .container {
        display: flex;
        max-width: 1000px;
        margin: 20px auto;
        gap: 20px;
    }

    .navbar {
        margin-left: 20px;
        align-items: center;
        justify-content: center;
        background-color: #f9f9f9;
        padding: 20px;
        border-radius: 12px;
        height: 600px;
        width: 280px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        flex-wrap: wrap;
        align-content: flex-start;
        flex-direction: row;
    }


    /* .profile {
                text-align: center;
                margin-bottom: 20px;
            } */

    .profile img {
        border-radius: 50%;
        width: 100px;
        height: 100px;
    }

    .menuprofile {
        list-style: none;
        padding: 10px;
    }

    .menuprofile li {
        padding: 15px;
        /* margin: 20px; */
        border-radius: 10px;
        font-size: 14px;
        width: 580px;
    }

    .menuprofile li:nth-child(1) {
        background-color: #48f5a499;
        color: #000;
    }

    .menuprofile li:nth-child(2) {
        background-color: #85dcff91;
        color: #000;
    }

    .menuprofile li:nth-child(3) {
        background-color: #ffeeba;
        color: #000;
    }

    .menuprofile li:nth-child(4) {
        background-color: #fff2caa8;
        color: #000;
    }

    .menuprofile li:nth-child(5) {
        background-color: #85dcff91;
        color: #000;
    }

    .menuprofile li:nth-child(6) {
        background-color: #ffcec4a8;
        color: #000;
    }

    .menuprofile li:nth-child(7) {
        background-color: #48f5a499;
        color: #000;
    }

    .main-content {
        flex: 1;
        background-color: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .search {
        display: flex;
        justify-content: center;
        margin: 10px 0;
    }

    .search input {
        padding: 10px 15px;
        width: 820px;
        border: 1px solid #ddd;
        border-radius: 25px;
        font-size: 16px;
        outline: none;
    }

    .row {
        display: flex;
        align-items: flex-start;
        /* Supaya sejajar di bagian atas */
    }


    .menuprofile {
        width: 10%;
        list-style: none;
        padding-left: 2px;
        margin-left: 10px;
        /* background-color: #eaeaea; */
    }

    .menuprofile li {
        margin: 10px;
    }
</style>
</head>

<body>


    <div class="container">


        <div class="main-content">

            <img src="{{ asset('assets/images/logo/humma.jpg') }}" alt="" width="220px"><br>
            <div style="position: absolute; right: 174px; top: 40px;">
                <a href="http://localhost:8000/" class="btn btn-outline-secondary">
                    <i class="fa fa-arrow-left"></i> Kembali
                </a>
            </div>




            {{-- <div class="search">
                    <input type="search" id="searchInput" placeholder="Cari sesuatu..." oninput="searchFunction()">
                </div> --}}
            <hr>
            <div class="row align-items-stretch">
                <!-- Foto Profil -->
                <div class="col-12 col-md-4 text-center mb-4 mb-md-0">
                    <img src="{{ asset('storage/uploads/photo/' . auth()->user()->photo) }}" alt="Foto Profil"
                        class="rounded-circle border" style="width: 120px; height: 120px; object-fit: cover;">
                    <h3 class="mt-1">{{ auth()->user()->name }}</h3>
                    <p class="text-muted">{{ auth()->user()->phone_number }}</p>
                    <div class="d-flex justify-content-center gap-5 mt-4" style= "margin-bottom: 30px;">
                        <!-- Tombol Edit Profile -->
                        <button class="btn btn-outline-info" type="button" data-bs-toggle="modal"
                            data-bs-target="#editProfileModal">
                            Edit Profile
                        </button>

                    </div>
                    <hr class="my-3">
                    <div class="alert alert-success light text-dark" role="alert"
                        style="background-color: rgba(40, 167, 69, 0.2);">
                        <p class="txt-dark"><strong>Tanggal Daftar :</strong>
                            {{ \Carbon\Carbon::parse(auth()->user()->created_at)->format('d-m-y') }}</p>
                    </div>
                    <div class="alert alert-info light text-dark" role="alert"
                        style="background-color: rgba(23, 162, 184, 0.2);">
                        <p class="txt-dark"><strong>Terakhir Aktif:</strong>
                            {{ \Carbon\Carbon::parse(auth()->user()->updated_at)->format('d-m-y') }}</p>
                    </div>

                </div>


                <!-- Modal Edit Profile -->
                <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <img src="{{ asset('assets/images/logo/humma.jpg') }}" alt="" width="200px">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('profile.update') }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <!-- Password Lama -->
                                    <div class="mb-3">
                                        <label for="old_password" class="form-label">Password Lama</label>
                                        <input type="password" class="form-control" id="old_password"
                                            name="old_password" required>
                                    </div>

                                    <!-- Password Baru -->
                                    <div class="mb-3">
                                        <label for="new_password" class="form-label">Password Baru</label>
                                        <input type="password" class="form-control" id="new_password"
                                            name="new_password" required>
                                    </div>

                                    <!-- Konfirmasi Password Baru -->
                                    <div class="mb-3">
                                        <label for="confirm_password" class="form-label">Konfirmasi Password
                                            Baru</label>
                                        <input type="password" class="form-control" id="confirm_password"
                                            name="confirm_password" required>
                                    </div>

                                    <!-- Tombol Simpan -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Batal</button>
                                        <button type="submit"
                                            style="
                                        padding: 10px 15px;
                                        border: none;
                                        background-color: #01A8EF;
                                        border-radius: 5px;
                                        font-size: 14px;
                                        margin-left: 10px;


                                    ">Simpan
                                            Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Garis Vertikal -->
                <div class="col-12 col-md-1 d-none d-md-block">
                    <div class="border-start mx-auto" style="height: 100%; border-left: 2px solid #7a7979;"></div>
                </div>

                <!-- Detail User -->
                <div class="col-12 col-md-7">
                    <div class="row">
                        <ul class="nav nav-tabs" id="profileTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="profile-tab" href="{{ 'account' }}" role="tab"
                                    aria-controls="profile" aria-selected="true">
                                    Profil
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="history-tab" href="{{ route('riwayat.index') }}"
                                    role="tab" aria-controls="history" aria-selected="false">
                                    Riwayat
                                </a>
                            </li>
                        </ul>

                        <div class="col-12 col-sm-6 mb-3">
                            <p class="text-muted m-0">Nama</p>
                            <p class="text-muted m-0">{{ auth()->user()->name }}</p><br>
                            <p class="text-muted m-0">Email</p>
                            <p class="text-muted m-0">{{ auth()->user()->email }}</p><br>
                            <p class="text-muted m-0">Alamat</p>
                            <p class="text-muted m-0">{{ auth()->user()->address }}</p><br><br>
                            <p class="text-muted m-0">Foto KTP</p>
                            <img src="{{ asset('storage/uploads/ktp/' . auth()->user()->ktp) }}" alt="KTP"
                                class="rounded border" style="width: 270px; height: 160px; object-fit: cover;">
                        </div>
                        <div class="col-12 col-sm-6">
                            <p class="text-muted m-0">NIK</p>
                            <p class="text-muted m-0">{{ auth()->user()->nik }}</p><br>
                            <p class="text-muted m-0">Tanggal Lahir</p>
                            <p class="text-muted m-0">{{ auth()->user()->birt_date }}</p><br>
                            <p class="text-muted m-0">Jenis Kelamin</p>
                            <p class="text-muted m-0">{{ auth()->user()->jk }}</p><br><br>
                            <p class="text-muted m-0">Foto SIM</p>
                            <img src="{{ asset('storage/uploads/sim/' . auth()->user()->sim) }}" alt="SIM"
                                class="rounded border" style="width: 270px; height: 160px; object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>


            <script>
                function searchFunction() {
                    const input = document.getElementById('searchInput').value.toLowerCase();
                    const orderCards = document.querySelectorAll('.order-card');

                    orderCards.forEach(card => {
                        const cardText = card.textContent.toLowerCase();
                        card.style.display = cardText.includes(input) ? '' : 'none';
                    });
                }

                function filterOrders(status) {
                    const orderCards = document.querySelectorAll('.order-card');

                    orderCards.forEach(card => {
                        card.style.display = (status === 'all' || card.dataset.status === status) ? '' : 'none';
                    });
                }
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
            </script>
</body>
