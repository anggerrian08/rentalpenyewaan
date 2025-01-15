@extends('layouts.navuser')

@section('content')
    <div class="mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div>

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Transaksi</title>
                <style>
                    * {
                        margin: 0;
                        padding: 0;
                        box-sizing: border-box;
                        font-family: Arial, sans-serif;
                    }

                    body {
                        background-color: #f4f8ff;
                        color: #333;
                    }

                    .container {
                        display: flex;
                        max-width: 1200px;
                        margin: 20px auto;
                        gap: 20px;
                    }

                    .navbar {
                        background-color: #fff;
                        padding: 20px;
                        border-radius: 10px;
                        width: 300px;
                        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                    }

                    .navbar .profile {
                        text-align: center;
                        margin-bottom: 20px;
                    }

                    .navbar .profile img {
                        border-radius: 50%;
                        width: 80px;
                        height: 80px;
                    }

                    .navbar .profile h3 {
                        margin-top: 10px;
                        font-size: 18px;
                    }

                    .navbar .menu {
                        list-style: none;
                    }

                    .navbar .menu li {
                        padding: 10px;
                        margin-bottom: 10px;
                        border-radius: 5px;
                        font-size: 14px;
                    }

                    .navbar .menu li:nth-child(1) {
                        background-color: #d1ecf1;
                        color: #0c5460;
                    }

                    .navbar .menu li:nth-child(2) {
                        background-color: #c3e6cb;
                        color: #155724;
                    }

                    .navbar .menu li:nth-child(3) {
                        background-color: #ffeeba;
                        color: #856404;
                    }

                    .navbar .menu li:nth-child(4) {
                        background-color: #f8d7da;
                        color: #721c24;
                    }

                    .main-content {
                        flex: 1;
                        background-color: #fff;
                        padding: 20px;
                        border-radius: 10px;
                        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                    }

                    .main-content h2 {
                        margin-bottom: 20px;
                    }

                    .filter {
                        display: flex;
                        gap: 20px;
                        margin-bottom: 30px;
                    }

                    .filter button {
                        width: 120px;
                        /* Ukuran lebar tetap untuk tombol */
                        padding: 10px;
                        /* Padding dalam tombol */
                        border: 2px solid #a2a3a5;
                        /* Border tombol */
                        border-radius: 25px;
                        /* Sudut melengkung */
                        background-color: transparent;
                        /* Latar belakang transparan */
                        cursor: pointer;
                        /* Kursor berubah menjadi pointer */
                        font-size: 15px;
                        /* Ukuran teks tombol */
                        color: #6b6e70;
                        /* Warna teks */
                        text-align: center;
                        /* Teks berada di tengah */
                        transition: background-color 0.3s, color 0.3s;
                        /* Efek transisi */
                    }

                    .filter button:hover {
                        border: 2px solid #01A8EF;
                        background-color: #D9F4FF;
                        /* Warna latar belakang saat hover */
                        color: #01A8EF;
                        /* Warna teks saat hover */
                    }

                    .transaction-list {
                        display: flex;
                        flex-direction: column;
                        gap: 15px;
                    }

                    .transaction-card {
                        display: flex;
                        gap: 20px;
                        background-color: #f9f9f9;
                        padding: 15px;
                        border-radius: 10px;
                        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                    }

                    .transaction-card img {
                        width: 80px;
                        height: 60px;
                        border-radius: 5px;
                    }

                    .transaction-details {
                        flex: 1;
                    }

                    .transaction-details h4 {
                        margin-bottom: 5px;
                        font-size: 16px;
                    }

                    .transaction-details p {
                        margin-bottom: 5px;
                        font-size: 14px;
                        color: #666;
                    }

                    .transaction-status {
                        margin-top: 5px;
                        font-size: 14px;
                        font-weight: bold;
                        color: #007bff;
                    }

                    .transaction-total {
                        text-align: right;
                        font-size: 14px;
                    }

                    .transaction-total span {
                        font-weight: bold;
                        color: #333;
                    }

                    .transaction-link {
                        text-align: right;
                        margin-top: 5px;
                    }

                    .transaction-link a {
                        font-size: 14px;
                        color: #007bff;
                        text-decoration: none;
                    }

                    .transaction-link a:hover {
                        text-decoration: underline;
                    }
                </style>
            </head>

            <body>
                <br></br>
                <div class="row align-items-center">
                    <div class="container">
                        <div class="navbar">
                            <div class="profile">
                                <img src="https://via.placeholder.com/80" alt="User">
                                <h3>Username User</h3>
                            </div>
                            <ul class="menu">
                                <li>Tanggal Order: 1 Apr 2024</li>
                                <li>Total Transaksi: 5</li>
                                <li>Pesanan Diproses</li>
                                <li>Pesanan Dibatalkan</li>
                            </ul>
                        </div>



                        <div class="main-content">
                            <h3>Riwayat Transaksi</h3>
                            <div class="filter">
                                <button> Cari</button>
                            </div>
                            <div class="filter">
                                <button>Semua</button>
                                <button>Diproses</button>
                                <button>Berlangsung</button>
                                <button>Terkirim</button>
                                <button>Dibatalkan</button>
                                <button>Selesai</button>
                            </div>

                            <div class="transaction-list">
                                <div class="transaction-card">
                                    <img src="https://via.placeholder.com/80" alt="Car">
                                    <div class="transaction-details">
                                        <h4>Avanza Velix</h4>
                                        <p>1 Apr 2024</p>
                                        <span class="transaction-status">Diproses</span>
                                    </div>
                                    <div class="transaction-total">
                                        <p>Total: <span>Rp 100.000,00</span></p>
                                        <div class="transaction-link">
                                            <a href="#">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Repeat this card for other transactions -->
                        </div>
                    </div>
                </div>
            </body>
        </div>
    @endsection
