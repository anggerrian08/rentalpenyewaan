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
                <div class="row">
                    <div class="navbar">
                        <!-- Foto Profil -->
                        <div class="profile">
                        <img src="{{ asset('assets/images/dashboard/profile.png') }}" alt="User">

                        <h3 style="margin: 5px 0; color: #333; font-family: 'Arial', sans-serif;">
                            {{ Auth::user()->name }}
                        </h3>
                    </div>
                        <!-- Informasi Pengguna -->
                        <div>
                            <p style="margin: 10px 0; color: #666; font-family: 'Arial', sans-serif;">
                                <strong>Email:</strong> {{ Auth::user()->email }}
                            </p>
                            <p style="margin: 10px 0; color: #666; font-family: 'Arial', sans-serif;">
                                <strong>Nama Lengkap:</strong> {{ Auth::user()->full_name }}
                            </p>
                            <p style="margin: 10px 0; color: #666; font-family: 'Arial', sans-serif;">
                                <strong>NIK:</strong> {{ Auth::user()->nik }}
                            </p>
                            <p style="margin: 10px 0; color: #666; font-family: 'Arial', sans-serif;">
                                <strong>Jenis Kelamin:</strong> {{ Auth::user()->gender }}
                            </p>
                        </div>
                    </div>


                    <ul class="menuprofile">
                        <li>Tanggal Daftar:</li>
                        <li>Total Transaksi:</li>
                        <li>Pesanan DiProses</li>
                        <li>Pesanan Berlangsung</li>
                        <li>Pesanan Ditolak</li>
                        <li>Pesanan Selesai</li>
                    </ul>
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
