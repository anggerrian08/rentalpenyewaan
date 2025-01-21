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
                    border-bottom: 2px solid #d1d5db;
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 10px;
                    width: 300px;
                    /* Tetapkan lebar tetap */
                    height: 600px;
                    /* Tetapkan tinggi tetap */
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                }

                .navbar .profile {
                    padding-left: 60px;
                    padding-right: 60px;
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
                    background-color: #48f5a499;
                    color: #000000;
                }

                .navbar .menu li:nth-child(2) {
                    background-color: #85dcff91;
                    color: #000000;
                }

                .navbar .menu li:nth-child(3) {
                    background-color: #ffeeba;
                    color: #000000;
                }

                .navbar .menu li:nth-child(4) {
                    background-color: #fff2caa8;
                    color: #000000;
                }

                .navbar .menu li:nth-child(5) {
                    background-color: #85dcff91;
                    color: #000000;
                }

                .navbar .menu li:nth-child(6) {
                    background-color: #ffcec4a8;
                    color: #000000;
                }

                .navbar .menu li:nth-child(7) {
                    background-color: #48f5a499;
                    color: #000000;
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
                    margin-bottom: 10px;
                }

                .filter button {
                    width: 120px;
                    /* Ukuran lebar tetap untuk tombol */
                    padding: 10px;
                    /* Padding dalam tombol */
                    border: 2px solid #d6d7da;
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

                body {
                    font-family: Arial, sans-serif;
                    background-color: #f9f9f9;
                    padding: 10px;
                }

                .order-card {
                    background-color: #ffffff;
                    border-radius: 10px;
                    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
                    padding: 20px;
                    margin: 20px auto;
                    max-width: 800px;
                }

                .order-header {
                    display: -webkit-box;
                    justify-content: space-between;
                    align-items: center;
                    margin-bottom: 5px;
                    gap: 10px;
                }

                .status-rejected {
                    padding: 5px 10px;
                    background-color: #fde1e1;
                    color: #ff0000;
                    font-size: 12px;
                    border-radius: 20px;
                }

                .order-title {
                    font-size: 15px;
                    color: #333333;
                    font-weight: bold;
                    /* gap: 20px; */
                }

                .order-date {
                    font-size: 14px;
                    color: #888888;
                }

                .order-status {
                    padding: 5px 10px;
                    background-color: #e0f7ff;
                    color: #007bff;
                    font-size: 12px;
                    border-radius: 20px;
                }

                .status-done {
                    padding: 5px 10px;
                    background-color: #cbfae4;
                    color: #198754;
                    font-size: 12px;
                    border-radius: 20px;
                }

                .status-diproses {
                    padding: 5px 10px;
                    background-color: #fdeebf;
                    color: #FFC107;
                    font-size: 12px;
                    border-radius: 20px;
                }

                .order-body {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                }

                .car-details {
                    display: flex;
                    align-items: center;
                }

                .car-details img {
                    width: 100px;
                    height: 100px;
                    border-radius: 0px;
                    object-fit: cover;
                    margin-right: 20px;
                }

                .car-info {
                    line-height: 1.6;
                }

                .car-brand {
                    font-size: 14px;
                    color: #555555;
                }

                .car-name {
                    font-size: 16px;
                    font-weight: bold;
                    color: #333333;
                    margin: 5px 0;
                }

                .car-price {
                    font-size: 14px;
                    color: #888888;
                }

                .rent-period {
                    font-size: 12px;
                    color: #bbbbbb;
                }

                .price-details {
                    text-align: right;
                }

                .price-details h4 {
                    font-size: 16px;
                    color: #333333;
                    margin-bottom: 10px;
                }

                .total-price {
                    font-size: 20px;
                    font-weight: bold;
                    color: #000000;
                    margin-bottom: 15px;
                }

                .detail-link {
                    font-size: 14px;
                    color: #007bff;
                    text-decoration: none;
                }

                .detail-link:hover {
                    text-decoration: underline;
                }

                .rent-again {
                    font-size: 15px;
                    color: #fff;
                    background-color: #01A8EF;
                    border-radius: 10px;
                    width: 150px;
                    height: 50px;
                    padding: 10px 20px;
                    /* Tambahkan ruang dalam */
                    border: none;
                    text-align: center;
                    cursor: pointer;
                }                    /* Your existing CSS styles */
                </style>
            </head>

            <body>
                <br></br>
                <div class="row align-items-center">
                    <div class="container">
                        <div class="navbar">
                            <div class="profile">
                                <img src="{{ asset('assets/images/dashboard/profile.png') }}" alt="User">
                                <h3>Username User</h3>
                            </div>
                            <ul class="menu">
                                <li>Tanggal Daftar: 1 Apr 2024</li>
                                <li>Total Transaksi: 5</li>
                                <hr>
                                <li>Pesanan DiProses</li>
                                <li>Pesanan Berlangsung</li>
                                <li>Pesanan Ditolak</li>
                                <li>Pesanan Selesai</li>
                            </ul>
                        </div>
                        <div class="grid text-left" style="--bs-gap: .25rem 1rem;">
                            <h3>Riwayat Transaksi</h3>
                            <div class="main-content">
                                {{-- search --}}
                                <div class="search" style="display: flex; justify-content: center; margin-top: 2px;">
                                    <input type="search" id="searchInput" placeholder="Cari sesuatu..."
                                        style="
                                        padding: 10px 15px;
                                        width: 820px;
                                        border: 1px solid #ddd;
                                        border-radius: 25px;
                                        outline: none;
                                        font-size: 16px;
                                        margin-bottom: 10px;
                                    "
                                        oninput="searchFunction()">
                                </div>
                                {{-- filter  --}}
                                <div class="filter">
                                    <button onclick="filterOrders('all')">Semua</button>
                                    <button onclick="filterOrders('diproses')">Diproses</button>
                                    <button onclick="filterOrders('berlangsung')">Berlangsung</button>
                                    <button onclick="filterOrders('terlambat')">Terlambat</button>
                                    <button onclick="filterOrders('dibatalkan')">Dibatalkan</button>
                                    <button onclick="filterOrders('selesai')">Selesai</button>
                                </div>
                                {{-- card isi --}}
                                <div id="orderList">
                                    <!-- Your order cards go here -->
                                    <div class="order-card" data-status="berlangsung">
                                        <div class="order-header">
                                            <p class="order-title">Pesanan</p>
                                            <p class="order-date">11 Apr 2024</p>
                                            <span class="order-status">Berlangsung</span>
                                        </div>
                                        <div class="order-body">
                                            <div class="car-details">
                                                <img src="https://via.placeholder.com/80x50" alt="Car Image">
                                                <div class="car-info">
                                                    <p class="car-brand">Toyota</p>
                                                    <h4 class="car-name">Avanza Veloz</h4>
                                                    <p class="car-price">Rp. 100.000,00 / hari</p>
                                                    <p class="rent-period">dd-mm-yy / dd-mm-yy</p>
                                                </div>
                                            </div>
                                            <div class="price-details">
                                                <h4>Total Tarif</h4>
                                                <p class="total-price">Rp 100.000,00</p>
                                                <a href="#" class="detail-link">Lihat Detail Sewa</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-card" data-status="diproses">
                                        <div class="order-header">
                                            <p class="order-title">Pesanan</p>
                                            <p class="order-date">11 Apr 2024</p>
                                            <span class="status-diproses">Diproses</span>
                                        </div>
                                        <div class="order-body">
                                            <div class="car-details">
                                                <img src="https://via.placeholder.com/80x50" alt="Car Image">
                                                <div class="car-info">
                                                    <p class="car-brand">Toyota</p>
                                                    <h4 class="car-name">Avanza Veloz</h4>
                                                    <p class="car-price">Rp. 100.000,00 / hari</p>
                                                    <p class="rent-period">dd-mm-yy / dd-mm-yy</p>
                                                </div>
                                            </div>
                                            <div class="price-details">
                                                <h4>Total Tarif</h4>
                                                <p class="total-price">Rp 100.000,00</p>
                                                <a href="#" class="detail-link">Lihat Detail Sewa</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-card" data-status="selesai">
                                        <div class="order-header">
                                            <p class="order-title">Pesanan</p>
                                            <p class="order-date">11 Apr 2024</p>
                                            <span class="status-done">Selesai</span>
                                        </div>
                                        <div class="order-body">
                                            <div class="car-details">
                                                <img src="https://via.placeholder.com/80x50" alt="Car Image">
                                                <div class="car-info">
                                                    <p class="car-brand">Toyota</p>
                                                    <h4 class="car-name">Avanza Veloz</h4>
                                                    <p class="car-price">Rp. 100.000,00 / hari</p>
                                                    <p class="rent-period">dd-mm-yy / dd-mm-yy</p>
                                                </div>
                                            </div>
                                            <div class="price-details">
                                                <h4>Total Tarif</h4>
                                                <p class="total-price">Rp 100.000,00</p>
                                                <a href="#" class="review-link">Buat Ulasan</a>
                                                <a href="#" class="rent-again">Sewa Lagi</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-card" data-status="dibatalkan">
                                        <div class="order-header">
                                            <p class="order-title">Pesanan</p>
                                            <p class="order-date">11 Apr 2024</p>
                                            <span class="status-rejected">Di Batalkan</span>
                                        </div>
                                        <div class="order-body">
                                            <div class="car-details">
                                                <img src="https://via.placeholder.com/80x50" alt="Car Image">
                                                <div class="car-info">
                                                    <p class="car-brand">Toyota</p>
                                                    <h4 class="car-name">Avanza Veloz</h4>
                                                    <p class="car-price">Rp. 100.000,00 / hari</p>
                                                    <p class="rent-period">dd-mm-yy / dd-mm-yy</p>
                                                </div>
                                            </div>
                                            <div class="price-details">
                                                <h4>Total Tarif</h4>
                                                <p class="total-price">Rp 100.000,00</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-card" data-status="terlambat">
                                        <div class="order-header">
                                            <p class="order-title">Pesanan</p>
                                            <p class="order-date">11 Apr 2024</p>
                                            <span class="status-rejected">Terlambat</span>
                                        </div>
                                        <div class="order-body">
                                            <div class="car-details">
                                                <img src="https://via.placeholder.com/80x50" alt="Car Image">
                                                <div class="car-info">
                                                    <p class="car-brand">Toyota</p>
                                                    <h4 class="car-name">Opo Wes    </h4>
                                                    <p class="car-price">Rp. 100.000,00 / hari</p>
                                                    <p class="rent-period">dd-mm-yy / dd-mm-yy</p>
                                                </div>
                                            </div>
                                            <div class="price-details">
                                                <h4>Total Tarif</h4>
                                                <p class="total-price">Rp 100.000,00</p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Repeat for other orders with appropriate data-status -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    function searchFunction() {
                        const input = document.getElementById('searchInput');
                        const filter = input.value.toLowerCase();
                        const orderCards = document.querySelectorAll('.order-card');

                        orderCards.forEach(card => {
                            const carName = card.querySelector('.car-name').textContent.toLowerCase();
                            const carBrand = card.querySelector('.car-brand').textContent.toLowerCase();
                            if (carName.includes(filter) || carBrand.includes(filter)) {
                                card.style.display = '';
                            } else {
                                card.style.display = 'none';
                            }
                        });
                    }

                    function filterOrders(status) {
                        const orderCards = document.querySelectorAll('.order-card');

                        orderCards.forEach(card => {
                            if (status === 'all') {
                                card.style.display = '';
                            } else {
                                const cardStatus = card.getAttribute('data-status');
                                if (cardStatus === status) {
                                    card.style.display = '';
                                } else {
                                    card.style.display = 'none';
                                }
                            }
                        });
                    }
                </script>
            </body>
        </div>
    @endsection
