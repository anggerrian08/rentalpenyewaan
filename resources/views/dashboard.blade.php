@extends('layouts.template')
@section('content')
    <br>
<style>
    .card {
        position: relative;
        background: transparent;
        border-radius: 12px;
        transition: transform 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-10px);
        /* box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); */
    }

    .card-title {
    font-size: 1.25rem; /* Ukuran font */
    font-weight: 500;   /* Ketebalan font */
    color: #ffffff;     /* Warna teks */
    text-align: center; /* Rata tengah */
    margin-bottom: 0.5rem; /* Spasi bawah */
}

.card-text {
    font-size: 1rem;    /* Ukuran font untuk teks biasa */
    font-weight: 800;   /* Ketebalan normal */
    color: #eaeaea;     /* Warna teks */
    text-align: center; /* Rata tengah */
    margin-top: 1px; /* Spasi atas */
}


    .card-img {
        opacity: 1;
        object-fit: cover;
    }

    .card-img-overlay {
        z-index: 2;
    }

    .hover-shadow {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .mb-3 i {
        color: #fff;
    }
</style>
    <head>
        {{-- <br></br> --}}
        <!-- Header -->
        <div class="bg-primary py-3 rounded">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="text-white fw-bold mb-1">Dashboard</h2>
                        <p class="text-white mb-0" style="font-size: 0.9rem;">Menu | Dashboard</p>
                    </div>
                </div>
            </div>
        </div>
    </head>

    <body>
        <div class="mt-4">
            <div class="row g-4 text-center">
                <!-- Card 1 -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card text-white border-0 shadow-lg hover-shadow">
                        <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
                            <div class="mb-3">
                                <i class="fas fa-cogs fa-3x"></i> <!-- Add icon -->
                            </div>
                            <h5 class="card-title">Total Merek</h5>
                            <p class="card-text">{{ $total_merek }}</p>
                        </div>
                        <img src="{{ asset('assets/images/logo/Card 13.svg') }}" alt="Background" class="card-img">
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card text-white border-0 shadow-lg hover-shadow">
                        <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
                            <div class="mb-3">
                                <i class="fas fa-car fa-3x"></i> <!-- Add icon -->
                            </div>
                            <h5 class="card-title">Total Mobil</h5>
                            <p class="card-text">{{ $total_car }}</p>
                        </div>
                        <img src="{{ asset('assets/images/logo/Card 12.svg') }}" alt="Background" class="card-img">
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card text-white ">
                        <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
                            <div class="mb-3">
                                <i class="fas fa-exchange-alt fa-3x"></i> <!-- Add icon -->
                            </div>
                            <h5 class="card-title">Total Transaksi</h5>
                            <p class="card-text">{{ $total_transaksi }}</p>
                        </div>
                        <img src="{{ asset('assets/images/logo/Card 11.svg') }}" alt="Background" class="card-img">
                    </div>
                </div>
            </div>
        </div>



        <!-- Bagian Chart -->
        <div class="row g-4">
            <div class="col-12 col-md-6">
                <div class="card border-0 shadow-sm p-3">
                    <h5 class="text-center mb-3"></h5>
                    {!! $chart->container() !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="card border-0 shadow-sm p-3">
                    <h5 class="text-center mb-3"></h5>
                    {!! $chartDonut->container() !!}
                </div>
            </div>
        </div>
        </div>
    </body>

    <!-- Script untuk Chart -->
    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}

    <script src="{{ $chartDonut->cdn() }}"></script>
    {{ $chartDonut->script() }}
@endsection
