@extends('layouts.template')
@section('content')
    <style>
        .kotak-biru {
            border-radius: 10px;
            background: linear-gradient(90deg, #15B9FF 33.4%, #0D6EFD 100%);
            padding: 20px;
            /* Ukuran padding lebih kecil */
            margin: 10px;
            /* Margin kecil */
            max-height: 85px;
            /* Lebar maksimum kotak */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Bayangan lebih halus */
        }
    </style>

    <head>
        <!-- Header -->
        <div class="bg-primary py-4">
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
            <!-- Bagian Gambar -->
            <div class="row g-4 text-center">
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <img src="{{ asset('assets/images/logo/1.svg') }}" alt="Logo 1" class="card-img-top img-fluid">
                        <h1>total merek: {{$total_merek}}</h1>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <img src="{{ asset('assets/images/logo/2.svg') }}" alt="Logo 2" class="card-img-top img-fluid">
                        <h1>total merek: {{$total_car}}</h1>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <img src="{{ asset('assets/images/logo/3.svg') }}" alt="Logo 3" class="card-img-top img-fluid">
                        <h1>total merek: {{$total_transaksi}}</h1>
                    </div>
                </div>
            </div>

            <!-- Bagian Chart -->
            <div class="row g-4">
                <div class="col-12 col-md-6">
                    <div class="card border-0 shadow-sm p-3">
                        <h5 class="text-center mb-3">Chart 1</h5>
                        {!! $chart->container() !!}
                    </div>
                </div>

                <div class="col-12 col-md-6">
                    <div class="card border-0 shadow-sm p-3">
                        <h5 class="text-center mb-3">Chart 2</h5>
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
