@extends('layouts.template')
@section('content')
    <br>

    <head>
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
                    <div class="card bg-overlay text-white border-0 shadow-sm">
                        <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
                            <h5 class="card-title">Total Merek</h5>
                            <p class="card-text">{{ $total_merek }}</p>
                        </div>
                        <img src="{{ asset('assets/images/logo/Card 13.svg') }}" alt="Background" class="card-img">
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card bg-overlay text-white border-0 shadow-sm">
                        <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
                            <h5 class="card-title">Total Mobil</h5>
                            <p class="card-text">{{ $total_car }}</p>
                        </div>
                        <img src="{{ asset('assets/images/logo/Card 12.svg') }}" alt="Background" class="card-img">
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card bg-overlay text-white border-0 shadow-sm">
                        <div class="card-img-overlay d-flex flex-column justify-content-center align-items-center">
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
