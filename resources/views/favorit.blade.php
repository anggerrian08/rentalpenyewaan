@extends('layouts.navuser')
@section('content')

    <head>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    </head>
    <style>
        /* Hero Section Styling */
        .hero-section {
            background-color: #f3f9ff;
            padding: 0;
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
            width: 500px;
            height: 190px;
            border-radius: 5px;
            margin-top: 5px;
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
            background-color: #e74c3c;
            color: #fff;
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
            background-color: #fff;
            color: #e74c3c;
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

        .form-row {
            display: flex;
            justify-content: space-between;
            gap: 15px;
            /* Memberikan jarak antara input fields */
        }

        .form-group {
            flex: 1;
            /* Memastikan setiap input memiliki ukuran yang sama */
            text-align: left;
        }

        .card {
            max-width: 2000px;
            margin: 0;
            position: relative;
            bottom: 65px;
        }

        .boton {
            background-color: #01A8EF;
            /* Warna biru */
            color: white;
            /* Warna teks putih */
            border: none;
            /* Menghapus border */
            padding: 10px 20px;
            /* Memberikan jarak di dalam tombol */
            font-size: 16px;
            /* Ukuran font */
            cursor: pointer;
            /* Menunjukkan cursor pointer saat hover */
            transition: background-color 0.3s ease, transform 0.3s ease;
            /* Animasi transisi */
        }

        .boton:hover {
            background-color: #0056b3;
            /* Warna biru yang lebih gelap saat hover */
            transform: scale(1.05);
            /* Membesarkan tombol sedikit saat hover */
        }

        .boton:focus {
            outline: none;
            /* Menghapus outline saat tombol difokuskan */
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            /* Memberikan efek glow biru */
        }

        .boton:active {
            background-color: #004085;
            /* Warna biru lebih gelap saat tombol ditekan */
            transform: scale(0.98);
            /* Memberikan efek mengecilkan sedikit saat tombol ditekan */
        }

        section,
        .section {
            color: var(--default-color);
            background-color: var(--background-color);
            padding: 60px 0;
            scroll-margin-top: 90px;
            overflow: clip;
            background-color: #f3f9ff;
        }

        h1 {
            color: #212529;
            font-size: 32px;
            margin-bottom: 10px;
            margin-top: 0px;
        }

        .po {
            margin-bottom: 5rem;
        }
    </style>
    <div class="hero-section">
        <div class="container text-center">
            <img src="assets.user/img/mbl.png" alt="Cars" class="hero-image">
            <!-- Card Add Merk -->
            <div class="card" style="width: 2000px;">
                <div class="card-header">
                    <img src="{{ asset('assets.user/img/humma.png') }}" alt="" width="200px"> <a href="/account">
                    </a>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('favorit.index') }}">
                        {{-- <p>filter mobil yang tersedia sesuai rentang tanggal<p> --}}
                        <div class="form-row">
                            <!-- Form Group: Tanggal Pinjam -->
                            <div class="form-group">
                                <label for="tanggal-pinjam" class="form-label"><b>Tanggal Pinjam</b></label>
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="fas fa-calendar-alt" style="color: #01A8EF;"></i>
                                    </span>
                                    <input type="date" class="form-control text-muted" id="tanggal-pinjam"
                                        name="order_date" value="{{ request('order_date') }}">
                                    <i class="bi bi-arrow-left-right mt-2 ms-3 text-muted"></i>
                                </div>
                            </div>

                            <!-- Form Group: Tanggal Kembali -->
                            <div class="form-group">
                                <label for="tanggal-kembali" class="form-label"><b>Tanggal Kembali</b></label>
                                <div class="input-group d-flex">
                                    <span class="input-group-text">
                                        <i class="fas fa-calendar-alt" style="color: #01A8EF;"></i>
                                    </span>
                                    <input type="date" class="form-control text-muted" id="tanggal-kembali"
                                        name="return_date" value="{{ request('return_date') }}">
                                    <button type="submit" class="boton ms-3 rounded">
                                        Cari
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <h1>Temukan Mobil Favorit Anda</h1>
            <p class="po">Jelajahi koleksi mobil favorit pilihan Anda. Dengan desain elegan dan performa terbaik,
                mobil-mobil ini siap
                memberikan pengalaman berkendara yang tak terlupakan. Nikmati kemudahan dalam mencari dan memilih mobil yang
                sesuai dengan gaya dan kebutuhan Anda.</p>
        </div>
    </div>

    <section id="features" class="features section">

        <div class="container">
            @foreach ($cars as $car)
                <div class="card">
                    <h3 style="text-align: left;">{{ $car->car->name }}</h3>
                    <form action="{{ route('car_likes.destroy', $car->id) }}" method="post" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            <div class="love-icon">❤</div>
                        </button>
                    </form>
                    <img src="{{ asset('storage/uploads/car/' . $car->car->photo) }}" class="car-image img-fluid">
                    <h3>{{ $car->car->model }}</h3>
                    <p class="brand">{{ $car->car->brand }}</p>
                    <div class="details">
                        <span class="text-muted">
                            <i class="fas fa-gas-pump"></i> {{ $car->car->fuel_type }}
                        </span>
                        <span class="text-muted">
                            <i class="fas fa-cogs"></i> {{ $car->car->type_transmisi }}
                        </span>
                        <span class="text-muted">
                            <i class="fas fa-user"></i> {{ $car->car->passanger_capacity }} Orang
                        </span>
                    </div>
                    <div class="price-button-wrapper">
                        <p class="price text-muted">Rp. {{ number_format($car->car->price, 0, ',', '.') }}</p>
                        <a href="{{ route('car.show', $car->car->id) }}" class="pesan-btn">pesan</a>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center">
            {{$cars->links()}}
        </div>
    </section>
@endsection
