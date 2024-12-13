@extends('layouts.template')

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

    <h2 class="mb-4">Detail Mobil</h2>

    <div class="card mb-3">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ asset('storage/uploads/car/'. $car->photo) }}" class="img-fluid rounded-start" alt="{{ $car->name }}">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $car->name }}</h5>
                    <p class="card-text"><strong>Deskripsi:</strong> {{ $car->description }}</p>
                    <p class="card-text"><strong>Tipe Transmisi:</strong> {{ $car->type_transmisi }}</p>
                    <p class="card-text"><strong>Jenis Bahan Bakar:</strong> {{ $car->fuel_type }}</p>
                    <p class="card-text"><strong>Tahun Pembuatan:</strong> {{ $car->manufacture_year }}</p>
                    <p class="card-text"><strong>Plat:</strong> {{ $car->plat }}</p>
                    <p class="card-text"><strong>Harga:</strong> Rp{{ number_format($car->price, 0, ',', '.') }}</p>
                    <p class="card-text"><strong>Stok:</strong> {{ $car->stock }}</p>
                    <p class="card-text"><strong>Kapasitas Penumpang:</strong> {{ $car->passenger_capacity }} orang</p>
                    <p class="card-text"><strong>Kapasitas Bagasi:</strong> {{ $car->luggage_capacity }} liter</p>
                    <p class="card-text"><strong>Merek:</strong> {{ $car->merek->name }}</p>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('car.index') }}" class="btn btn-primary">Kembali ke Daftar Mobil</a>
</div>
@endsection
