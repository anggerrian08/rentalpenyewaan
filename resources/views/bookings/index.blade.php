@extends('layouts.navuser')

@section('content')

<div class="container mt-5">

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

    <style>
    .kotak-biru {
        border-radius: 10px;
        background: linear-gradient(90deg, #15B9FF 33.4%, #0D6EFD 100%);
        padding: 20px;
        margin: 10px;
        max-height: 85px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }


    </style>

<br><br>
<h1>hello</h1>
<div class="kotak-biru">
    <div class="d-flex justify-content-between align-items-start mb-3">
        <div>
            <h2 class="text-white fw-bold mb-1">Approval Sewa</h2>
            <p class="text-white fw-bold mb-0" style="font-size: 0.9rem;">Menu | Approval Sewa</p>
        </div>
    </div>
</div>

{{-- <div class="container mt-4">
    <div class="row">
        @foreach ($cars as $car)
            <div class="col-xl-3 col-lg-4 col-sm-12 col-md-6">
                <div class="card p-2">
                    <h3>{{ $car->name }}</h3>
                    <p class="brand">{{ $car->brand }}</p>
                    <div class="love-icon">
                        <i class="fa-solid fa-heart"></i>
                    </div>
                    <img src="{{ asset('storage/uploads/car/'. $car->photo) }}" alt="{{ $car->merek->name}}" class="car-image img-fluid">
                    <div class="details mt-2">
                        <span><i class="fa-solid fa-gas-pump"></i> {{ $car->fuel_type }}</span>
                        <span><i class="fa-solid fa-gears"></i> {{ $car->type_transmisi }}</span>
                        <span><i class="fa-solid fa-users"></i> {{ $car->passenger_capacity }} Orang</span>
                    </div>
                    <div class="price mt-2">
                        <p>Rp. {{ number_format($car->price, 2, ',', '.') }}/ <span>hari</span></p>
                    </div>
                    <a href="{{ route('car.show', $car->id) }}" class="pesan-btn">
                        <i class=" btn-primary"></i> Show
                    </a>
                </div>
            </div>
        @endforeach
    </div> --}}
@endsection
