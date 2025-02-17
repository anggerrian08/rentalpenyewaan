@extends(auth()->user()->hasRole('user') ? 'layouts.navuser' : 'layouts.template')

@section('content')
<div class="container mt-5">
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ Auth::user()->hasRole('admin') ? route('car.index') : route('pemesanan.index') }}" 
        class="btn btn-outline-secondary mb-3"  style="margin-top: 70px">
        ← Kembali ke Daftar Mobil
    </a>

    <div class="card shadow p-4">
        <div class="row">
            <!-- Bagian Foto -->
            <div class="col-md-5 text-center">
                <img src="{{ asset('storage/uploads/car/' . $car->photo) }}" 
                    class="img-fluid rounded mb-3" 
                    alt="{{ $car->name }}" 
                    style="width: 300px; height: 300px; object-fit: cover;">
                
                @if ($car->additional_photos)
                    <div class="d-flex justify-content-center">
                        @foreach ($car->additional_photos as $photo)
                            <img src="{{ asset('storage/uploads/car/' . $photo) }}" 
                                class="img-thumbnail mx-1" 
                                width="70" 
                                alt="Thumbnail">
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Bagian Detail -->
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

                <!-- Bagian Tombol -->
                @if (Auth::user()->hasRole('user'))
                    <div class="d-flex mt-3 gap-2 align-items-center">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" 
                                data-bs-target="#pesanModal{{ $car->id }}">
                                Pesan Sekarang
                            </button>

                         

                        
                        <form action="{{ route('car_likes.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="car_id" value="{{ $car->id }}">
                            <button type="submit" class="btn btn-outline-warning">
                                <i class="fas fa-heart"></i> Suka
                            </button>
                        </form>
                        <!-- Count Like -->

                        <div class="ms-2 " style="position: relative; left: 140px;">
                            <i class="bi bi-heart-fill text-danger"></i>  {{ $count_like }}
                            <i class="bi bi-cart text-primary ms-4"></i> {{$count_transaksi}}
                        </div>
                    </div>
                @endif
                @if(Auth::user()->hasRole('admin'))
                    <i class="fas fa-heart text-danger"></i> {{ $count_like }}
                    <i class="fas fa-shopping-cart text-primary ms-4"></i>{{$count_transaksi}}
                @endif

                @if ($car->stock == 0 )
                    <div class="alert alert-warning mt-3">
                        <strong>Mobil sedang dipinjam!</strong> Mobil ini sedang digunakan dari 
                        <strong>{{ \Carbon\Carbon::parse($last_booking->order_date)->format('d M Y') }}</strong> 
                        sampai 
                        <strong>{{ \Carbon\Carbon::parse($last_booking->return_date)->format('d M Y') }}</strong>.
                    </div>
                @endif

            </div>
        </div>
    </div>

    <!-- Deskripsi Mobil -->
    <h5 class="text-primary mt-4">Deskripsi Mobil</h5>
    <div class="card shadow p-4">
        <p class="text-muted">{{ $car->description }}</p>
    </div>

    <!-- Bagian Review -->
    <div class="card p-4 shadow mt-4">
        <h4 class="text-primary">Review</h4>
        <div class="d-flex align-items-center mb-4">
            <h1 class="display-4 text-success me-3">{{ $average_rating }}</h1>
            <div>
                <div class="star-rating text-warning">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= floor($average_rating))
                            ⭐
                        @elseif($i - 0.5 == $average_rating)
                            ⭐☆
                        @else
                            ☆
                        @endif
                    @endfor
                </div>
                <p class="mb-0 text-muted">{{ $count_data }} Review</p>
            </div>
        </div>

        @foreach ($reviews as $review)
            <div class="border p-3 mb-3 rounded">
                <div class="d-flex align-items-center">
                    <img src="{{ asset('/storage/uploads/photo/' . $review->user->photo) }}" 
                        class="rounded-circle me-3" height="80px" width="80px" alt="">
                    <div>
                        <strong>{{ $review->user->email }}</strong><br>
                        <p class="text-warning">{{ str_repeat('⭐', $review->rating) }}</p>
                    </div>
                </div>
                <p class="mt-2">{{ $review->review }}</p>
            </div>
        @endforeach
    </div>
</div>

<!-- Modal Pemesanan -->
<div class="modal fade" id="pesanModal{{ $car->id }}" tabindex="-1" 
    aria-labelledby="pesanModalLabel{{ $car->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi Pemesanan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('bookings.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="car_id" value="{{ $car->id }}">
                    <div class="mb-3">
                        <label class='form-label'>Order Date</label>
                        <input type="date" class="form-control" name="order_date" >
                        @error('order_date')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class='form-label'>Return Date</label>
                        <input type="date" class="form-control" name="return_date" >
                        @error('return_date')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Konfirmasi Pesan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
