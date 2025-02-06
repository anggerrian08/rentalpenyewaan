@extends(auth()->user()->hasRole('user') ? 'layouts.navuser' : 'layouts.template')

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

    <div class="card shadow p-4">
        <div class="row">
            <!-- Image Section -->
            <div class="col-md-5 text-center">
                <img src="{{ asset('storage/uploads/car/'. $car->photo) }}" class="img-fluid rounded mb-3" alt="{{ $car->name }}">
                <div class="d-flex justify-content-center">
                    @if($car->additional_photos)
                        @foreach ($car->additional_photos as $photo)
                            <img src="{{ asset('storage/uploads/car/'. $photo) }}" class="img-thumbnail mx-1" width="70" alt="Thumbnail">
                        @endforeach
                    @endif
                </div>
            </div>
            
            <!-- Detail Section -->
            <div class="col-md-7">
                <h3 class="text-primary">{{ $car->name }}</h3>
                <h4 class="text-success">Rp{{ number_format($car->price, 0, ',', '.') }}/hari</h4>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Merek:</strong> {{ $car->merek->name }}</p>
                        <p><strong>Jenis:</strong> {{ $car->type }}</p>
                        <p><strong>Tahun:</strong> {{ $car->manufacture_year }}</p>
                        <p><strong>Plat:</strong> {{ $car->plat }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Bahan Bakar:</strong> {{ $car->fuel_type }}</p>
                        <p><strong>Transmisi:</strong> {{ $car->type_transmisi }}</p>
                        <p><strong>Penumpang:</strong> {{ $car->passenger_capacity }}</p>
                        <p><strong>Koper:</strong> {{ $car->luggage_capacity }}</p>
                    </div>
                </div>
                <p><strong>Deskripsi:</strong></p>
                <p class="text-muted">{{ $car->description }}</p>

                <div class="d-flex mt-3">
                    @if ($car->stock > 0)
                        <button type="button" clasSSs="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#pesanModal{{$car->id}}">
                            Pesan Sekarang
                        </button>
                    @else
                        <button type="button" class="btn btn-danger" disabled>
                            Stok Habis
                        </button>
                    @endif
                    <form action="{{route('car_likes.store')}}" method="post">
                        @csrf
                        <input type="hidden" name="car_id" value="{{$car->id}}">
                        <button type="submit" class="btn btn-outline-warning">
                            <i class="fas fa-heart"></i> Suka
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Review Section -->
    <div class="card p-4 shadow mt-4">
        <h4 class="text-primary">Review</h4>
        <div class="d-flex align-items-center mb-4">
            <h1 class="display-4 text-success me-3">4.6</h1>
            <div>
                <div class="star-rating text-warning">
                    ⭐⭐⭐⭐☆
                </div>
                <p class="mb-0 text-muted">{{$count_data}} Review</p>
            </div>
        </div>
        <div>
            <div class="progress mb-2" style="height: 8px;">
                <div class="progress-bar bg-warning" style="width: 80%;"></div>
            </div>
            <p class="mb-0">Ulasan Pengguna</p>
        </div>
        @foreach ($reviews as $review)
            <div class="border p-3 mb-3 rounded">
                <div class="d-flex align-items-center">
                    <img src="{{asset('/storage/uploads/photo/'. $review->user->photo)}}" class="rounded-circle me-3" height="80px" width="80px" alt="">
                    <div>
                        <strong>{{ $review->user->email }}</strong><br>
                        <p class="text-warning">{{ str_repeat('⭐', $review->rating) }}</p>
                    </div>
                </div>
                <p class="mt-2">{{ $review->review }}</p>
            </div>
        @endforeach
    </div>

    <a href="{{ route('car.index') }}" class="btn btn-secondary mt-4">Kembali ke Daftar Mobil</a>
</div>
@endsection
