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
            <!-- Bagian Gambar -->
            <div class="row g-4 text-center">
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <img src="{{ asset('assets/images/logo/1.svg') }}" alt="Logo 1" class="card-img-top img-fluid">
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <img src="{{ asset('assets/images/logo/2.svg') }}" alt="Logo 2" class="card-img-top img-fluid">
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <img src="{{ asset('assets/images/logo/3.svg') }}" alt="Logo 3" class="card-img-top img-fluid">
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
