@extends('layouts.navuser')
@section('content')

    <head>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>

    <style>
        /* Hero Section Styling */
        .hero-section {
            background-color: #f3f9ff;
            padding: 50px 0;
        }

        .hero-section .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .hero-image {
            width: 1125px;
            height: auto;

        }

        h1 {
            color: #212529;
            font-size: 32px;
            margin-bottom: 20px;
        }

        p {
            color: #6c757d;
            font-size: 16px;
            line-height: 1.5;
        }

        /* Card Styling */
        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            margin: 20px auto;
            width: 80%;
        }

        .card {
            background-color: #ffffff;
            width: 250px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 15px;
            text-align: center;
            position: relative;
            transition: all 0.3s ease;

        }

        .card:hover {
            transform: translateY(-10px);
        }

        .car-image {
            width: 100%;
            height: auto;
            border-radius: 5px;
            margin-top: 50px;
            /* To give space for the car name and love icon */
        }

        h3 {
            color: #212529;
            font-size: 18px;
            margin-bottom: 5px;
        }

        .brand {
            color: #6c757d;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .details {
            display: flex;
            justify-content: space-between;
            color: #2D465E;
            font-size: 12px;
            margin-bottom: 15px;
        }

        .price {
            font-weight: bold;
            color: #2D465E;
        }

        /* Love Icon Styling */
        .love-icon {
            position: absolute;
            top: 15px;
            right: 15px;
            background-color: rgba(255, 255, 255, 0.8);
            color: #e74c3c;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: background 0.3s, color 0.3s;
        }

        .love-icon:hover {
            background-color: #e74c3c;
            color: #fff;
        }

        /* Pesan Button Styling */
        .pesan-btn {
            background-color: #0D83FD;
            color: #fff;
            border: none;
            border-radius: 20px;
            padding: 5px 15px;
            cursor: pointer;
            transition: background 0.3s;
            font-size: 14px;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        .pesan-btn:hover {
            background-color: #0056b3;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            padding: 5px 15px;
        }

        .car-name {
            font-size: 1em;
            /* Perkecil ukuran font */
            font-weight: bold;
            margin: 0;
            position: absolute;
            top: 5px;
            /* Sesuaikan posisi agar lebih ke atas */
            left: 10px;
        }


        .price-button-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .price {
            margin: 0;
            font-size: 1em;
        }

        .pesan-btn {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 13px;
        }

        .pesan-btn:hover {
            background-color: #0056b3;
        }
    </style>
    <div class="hero-section">
        <div class="container text-center">
            <img src="assets.user/img/mbl.png" alt="Cars" class="hero-image">
            <h1>Temukan Mobil Favorit Anda</h1>
            <p>Jelajahi koleksi mobil favorit pilihan Anda. Dengan desain elegan dan performa terbaik, mobil-mobil ini siap
                memberikan pengalaman berkendara yang tak terlupakan. Nikmati kemudahan dalam mencari dan memilih mobil yang
                sesuai dengan gaya dan kebutuhan Anda.</p>
            <div class="container">
                @foreach ($data as $car)
                    <div class="card">
                        <h3 style="text-align: left;">Avanza Veloz</h3>
                        <div class="love-icon">❤</div>
                        <img src="assets.user/img/mobil1.png" alt="" class="car-image">
                        <h3>{{ $car->model }}</h3>
                        <p class="brand">{{ $car->brand }}</p>
                        <div class="details">
                            <span class="text-muted">
                                <i class="fas fa-gas-pump"></i> Bensin
                            </span>
                            <span class="text-muted">
                                <i class="fas fa-cogs"></i> Manual
                            </span>
                            <span class="text-muted">
                                <i class="fas fa-user"></i> {{ $car->seats }} Orang
                            </span>
                        </div>
                        <div class="price-button-wrapper">
                            <p class="price text-muted">Rp. {{ number_format($car->price, 0, ',', '.') }}</p>
                            <button class="pesan-btn">Pesan</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
