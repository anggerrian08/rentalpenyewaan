@extends('layouts.navuser')
@section('content')
        <title>User Profile</title>
        <style>
            body {
                background-color: #f4f8ff;
                color: #333;
            }

            .container {
                display: flex;
                max-width: 950px;
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
        <br></br>
        <br></br>

        <div class="container">


            <div class="main-content">
                <h3>Profile</h3>

                {{-- <div class="search">
                    <input type="search" id="searchInput" placeholder="Cari sesuatu..." oninput="searchFunction()">
                </div> --}}
                <hr>
                <div class="row align-items-stretch">
                    <!-- Foto Profil -->
                    <div class="col-12 col-md-4 text-center mb-4 mb-md-0">
                        <img src="{{ asset('storage/uploads/photo/' . auth()->user()->photo) }}" alt="Foto Profil"
                            class="rounded-circle border" style="width: 120px; height: 120px; object-fit: cover;">
                        <h3 class="mt-1">{{auth()->user()->name}}</h3>
                        <p class="text-muted">{{ auth()->user()->phone_number }}</p>
                        <div class="d-flex justify-content-center gap-2 mt-2">
                            <button class="btn btn-outline-info" type="button">Email</button>
                            <button class="btn btn-outline-info" type="button">Kirim</button>
                        </div>
                        <hr class="my-3">
                        <div class="alert alert-success light text-dark" role="alert" style="background-color: rgba(40, 167, 69, 0.2);">
                            <p class="txt-dark"><strong>Tanggal Daftar :</strong>
                                {{ \Carbon\Carbon::parse(auth()->user()->created_at)->format('d-m-y') }}</p>
                        </div>
                        <div class="alert alert-info light text-dark" role="alert" style="background-color: rgba(23, 162, 184, 0.2);">
                            <p class="txt-dark"><strong>Terakhir Aktif:</strong>
                                {{ \Carbon\Carbon::parse(auth()->user()->updated_at)->format('d-m-y') }}</p>
                        </div>

                    </div>

                    <!-- Garis Vertikal -->
                    <div class="col-12 col-md-1 d-none d-md-block">
                        <div class="border-start mx-auto" style="height: 100%; border-left: 2px solid #7a7979;"></div>
                    </div>

                    <!-- Detail User -->
                    <div class="col-12 col-md-7">
                        <div class="row">
                            <div class="col-12 col-sm-6 mb-3">
                                <p class="text-muted m-0">Nama</p>
                                <p class="text-muted m-0">{{ auth()->user()->name }}</p><br>
                                <p class="text-muted m-0">Email</p>
                                <p class="text-muted m-0">{{ auth()->user()->email }}</p><br>
                                <p class="text-muted m-0">Alamat</p>
                                <p class="text-muted m-0">{{ auth()->user()->address }}</p><br><br>
                                <p class="text-muted m-0">Foto KTP</p>
                                <img src="{{ asset('storage/uploads/ktp/' . auth()->user()->ktp) }}" alt="KTP"
                                    class="rounded border" style="width: 100%; height: 120px; object-fit: cover;">
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
                                    class="rounded border"  style="width: 100%; height: 120px; object-fit: cover;">
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
    </body>
@endsection
