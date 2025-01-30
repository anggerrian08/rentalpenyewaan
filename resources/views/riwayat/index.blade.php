{{-- @extends('layouts.navuser')

@section('content') --}}
<!-- CSS Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- JavaScript Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
<div class="mt-5">
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
                    max-width: 1150px;
                    margin: 20px auto;
                    gap: 20px;
                }

                .navbar {
                    border-bottom: 2px solid #d1d5db;
                    background-color: #fff;
                    padding: 20px;
                    border-radius: 10px;
                    width: 210px;
                    /* Tetapkan lebar tetap */
                    height: 600px;
                    /* Tetapkan tinggi tetap */
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                }

                .navbar .profile {
                    padding-left: 50px;
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

                ul {
                    margin-top: 0;
                    margin-bottom: 1rem;
                    padding-left: 0px;
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
                }

                /* Your existing CSS styles */
            </style>
        </head>

        <body>
            <br></br>
            <div>
                <div class="row align-items-center">
                    <div class="container">
                        <div class="navbar">
                            <div class="profile">
                                <img src="{{ asset('assets/images/dashboard/profile.png') }}" alt="User">
                                <h3>{{ Auth::user()->name }}</h3>
                            </div>
                            <ul class="menu">
                                <li>Tanggal Daftar: {{ Auth::user()->created_at->translatedFormat('j F Y') }}</li>
                                <li>Total Transaksi: {{ $count_transaksi }}</li>
                                <hr>
                                <li>Pesanan DiProses {{ $pesanan_diprocess }}</li>
                                <li>Pesanan Berlangsung {{ $pesanan_berlangsung }}</li>
                                <li>Pesanan Ditolak {{ $pesanan_ditolak }}</li>
                                <li>Pesanan Selesai {{ $pesanan_selesai }}</li>
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
                                                width: 550px;
                                                border: 1px solid #ddd;
                                                border-radius: 25px;
                                                outline: none;
                                                font-size: 16px;
                                                margin-bottom: 10px;
                                            "
                                        oninput="searchFunction()">
                                        <form action="{{route('riwayat.index')}}" method="GET">
                                            <input type="date" id="filterDate"
                                                style="
                                                        padding: 10px 15px;
                                                        border: 1px solid #ddd;
                                                        border-radius: 25px;
                                                        outline: none;
                                                        font-size: 16px;
                                                        margin-bottom: 10px;
                                                        margin-left: 10px;
                                                         color: #6b6e70;
                                                    " name="order_date">

                                                <button type="submit"
                                                style="
                                                        padding: 10px 15px;
                                                        border: none;
                                                        background-color: #01A8EF;
                                                        color: white;
                                                        border-radius: 50px;
                                                        font-size: 14px;
                                                        margin-left: 10px;
                                                        width: 85px;
                                                        height: 40px;
                                                    ">
                                                Terapkan
                                                </button>
                                        </form>
                                </div>

                                {{-- filter  --}}
                                <div class="filter">
                                    <button onclick="filterOrders('all')">Semua</button>
                                    <button onclick="filterOrders('in_process')">Diproses</button>
                                    <button onclick="filterOrders('borrowed')">Berlangsung</button>
                                    <button onclick="filterOrders('late')">Terlambat</button>
                                    <button onclick="filterOrders('rejected')">DiTolak</button>
                                    <button onclick="filterOrders('returned')">Selesai</button>
                                </div>
                                {{-- card isi --}}
                                <div id="orderList">
                                    <!-- Your order cards go here -->
                                    @foreach ($data_all as $item)
                                        <div class="order-card" data-status="{{ $item->booking->status }}">
                                            <div class="order-header">
                                                <p class="order-title">Pesanan</p>
                                                <p class="order-date">
                                                    {{ $item->created_at->translatedFormat('d M Y') }}
                                                </p>
                                                <span class="order-status">{{ $item->booking->status }}</span>
                                            </div>
                                            <div class="order-body">
                                                <div class="car-details">
                                                    <img src="{{ asset('storage/uploads/car/' . $item->booking->car->photo) }}"
                                                        alt="Car Image">
                                                    <div class="car-info">
                                                        <p class="car-brand">{{ $item->booking->car->merek->name }}</p>
                                                        <h4 class="car-name">{{ $item->booking->car->name }}</h4>
                                                        <p class="car-price">Rp.
                                                            {{ number_format($item->booking->car->price, 2, ',', '.') }}
                                                            /
                                                            hari</p>
                                                        <p class="rent-period">{{ $item->booking->order_date }} /
                                                            {{ $item->booking->return_date }}</p>
                                                    </div>
                                                </div>
                                                <div class="price-details">
                                                    <h4>Total Tarif</h4>
                                                    <p class="total-price">Rp
                                                        {{ number_format($item->total_price, 2, ',', '.') }}</p>
                                                    @if ($item->booking->status == 'returned')
                                                        <button type="button" data-bs-toggle="modal"
                                                            data-bs-target="#review{{ $item->booking->car->id }}"
                                                            style="
                                                                padding: 10px 15px;
                                                                border: none;
                                                                background-color: #ffc107;
                                                                color: white;
                                                                border-radius: 50px;
                                                                font-size: 14px;
                                                                margin-left: 10px;


                                                            ">
                                                            <i class="fas fa-star" style="margin-right: 5px;"></i>
                                                            Beri Ulasan</button>
                                                    @endif
                                                    <button type="button" class="btn btn-success"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#detail{{ $item->id }}"
                                                        style="
                                                            padding: 10px 15px;
                                                            border: none;
                                                            background-color: #28a745;
                                                            color: white;
                                                            border-radius: 50px;
                                                            font-size: 14px;
                                                            margin-left: 10px;
                                                        ">
                                                        <i class="fas fa-eye" style="margin-right: 5px;"></i>
                                                        Lihat Detail Sewa
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="pagination-wrapper"
                                        style="display: flex; justify-content: center; margin-top: 20px;">
                                        {{ $data_all->links('pagination::bootstrap-5') }}
                                    </div>
                                </div>
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

    @foreach ($data_all as $item)
        <div class="modal fade" id="review{{ $item->booking->car->id }}" tabindex="-1"
            aria-labelledby="reviewModalLabel" aria-hidden="true">

            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="review">Beri Ulasan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('review.store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="car_id" value="{{ $item->booking->car->id }}">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="rating{{ $item->booking->car->name }}" class="form-label">Rating</label>
                                <select class="form-select" id="rating" name="rating" required>
                                    <option value="5">5 - Sangat Baik</option>
                                    <option value="4">4 - Baik</option>
                                    <option value="3">3 - Cukup</option>
                                    <option value="2">2 - Kurang</option>
                                    <option value="1">1 - Sangat Buruk</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="review" class="form-label">Ulasan</label>
                                <textarea class="form-control" id="review" name="review" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Kirim Ulasan</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    {{-- @endsection --}}
    <script>
        function filterByDate() {
            const dateValue = document.getElementById('filterDate').value;
            const orders = document.querySelectorAll('.order-card');

            orders.forEach(order => {
                const orderDate = order.querySelector('.order-date').textContent.trim();
                if (dateValue && !orderDate.includes(dateValue)) {
                    order.style.display = 'none';
                } else {
                    order.style.display = 'block';
                }
            });
        }

        function applyFilters() {
            searchFunction(); // Panggil fungsi pencarian
            filterByDate(); // Panggil fungsi filter tanggal
        }
    </script>

    @foreach ($data_all as $item)
        <div class="modal fade" id="review{{ $item->booking->car->id }}" tabindex="-1"
            aria-labelledby="reviewLabel{{ $item->booking->car->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reviewLabel{{ $item->booking->car->id }}">Beri Ulasan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('review2.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="car_id" value="{{ $item->booking->car->id }}">
                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating</label>
                                <select name="rating" id="rating" class="form-control" required>
                                    <option value="5">★★★★★</option>
                                    <option value="4">★★★★☆</option>
                                    <option value="3">★★★☆☆</option>
                                    <option value="2">★★☆☆☆</option>
                                    <option value="1">★☆☆☆☆</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="review" class="form-label">Ulasan</label>
                                <textarea name="review" id="review" class="form-control" rows="4" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-warning">Kirim Ulasan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    @foreach ($data_all as $item)
        <div class="modal fade" id="detail{{ $item->id }}" tabindex="-1"
            aria-labelledby="reviewLabel{{ $item->booking->car->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reviewLabel{{ $item->booking->car->id }}">Detail Ulasan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <strong>Email:</strong>
                            <p class="text-muted mb-1">{{ $item->booking->user->email }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Mobil:</strong>
                            <p class="text-muted mb-1">{{ $item->booking->car->name }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Durasi Sewa:</strong>
                            <p class="text-muted mb-1">{{ $item->rental_duration_days }} hari</p>
                        </div>
                        <div class="mb-3">
                            <strong>Total Harga:</strong>
                            <p class="fw-bold text-primary">Rp {{ number_format($item->total_price, 0, ',', '.') }}
                            </p>
                        </div>
                        <div class="mb-3">
                            <strong>Total Denda:</strong>
                            <p class="fw-bold text-danger">Rp {{ number_format($item->booking->denda, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
