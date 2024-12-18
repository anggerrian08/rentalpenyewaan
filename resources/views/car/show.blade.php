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
                <div class="mt-3 d-flex justify-content-center">
                    <img src="{{ asset('storage/uploads/car/'. $car->photo) }}" class="img-thumbnail mx-1" width="60" alt="{{ $car->name }}">
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title">{{ $car->name }}</h3>
                    <h4 class="text-primary">Rp{{ number_format($car->price, 0, ',', '.') }}/hari</h4>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <p><strong>Merek mobil:</strong> {{ $car->merek->name }}</p>
                            <p><strong>Jenis mobil:</strong> {{ $car->type }}</p>
                            <p><strong>Tahun pembuatan:</strong> {{ $car->manufacture_year }}</p>
                            <p><strong>Plat:</strong> {{ $car->plat }}</p>
                        </div>
                        <div class="col-6">
                            <p><strong>Jenis bahan bakar:</strong> {{ $car->fuel_type }}</p>
                            <p><strong>Jenis transmisi:</strong> {{ $car->type_transmisi }}</p>
                            <p><strong>Muatan orang:</strong> {{ $car->passenger_capacity }}</p>
                            <p><strong>Muatan koper:</strong> {{ $car->luggage_capacity }}</p>
                        </div>
                    </div>
                    <p><strong>Deskripsi:</strong></p>
                    <p>{{ $car->description }}</p>

                    <div class="d-flex mt-3">
                        <!-- Button trigger modal -->
                        @if ($car->stock > 0)
                        <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#pesanModal">
                            Pesan Sekarang
                        </button>
                        @else
                        <button type="button" class="badge btn-danger me-2">
                            stock habis
                        </button>
                        @endif
                        
                        <form action="{{route('car_likes.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="car_id" value="{{$car->id}}">
                            <button type="submit"  class="badge btn-warning">
                                suka
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('car.index') }}" class="btn btn-secondary">Kembali ke Daftar Mobil</a>
</div>

<!-- Modal -->
<div class="modal fade" id="pesanModal" tabindex="-1" aria-labelledby="pesanModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pesanModalLabel">Pesan Mobil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="modal-body">
                    <form action="{{ route('bookings.store') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{$car->id}}" name="car_id">
                        <div class="mb-3">
                            <label for="order_date" class="form-label">Tanggal Pesan</label>
                            <input type="date" class="form-control" id="order_date" name="order_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="return_date" class="form-label">Tanggal Kembali</label>
                            <input type="date" class="form-control" id="return_date" name="return_date" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Konfirmasi Pesanan</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
