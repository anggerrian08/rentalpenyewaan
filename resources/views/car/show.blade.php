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

    <h2 class="text-primary mb-4">Detail Booking</h2>

    <div class="card mb-5 shadow">
        <div class="row g-0">
            <!-- Image Section -->
            <div class="col-md-5 text-center">
                <img src="{{ asset('storage/uploads/car/'. $car->photo) }}" class="img-fluid rounded-start p-3" alt="{{ $car->name }}">
                <div class="mt-3 d-flex justify-content-center">
                    @if($car->additional_photos)
                        @foreach ($car->additional_photos as $photo)
                            <img src="{{ asset('storage/uploads/car/'. $photo) }}" class="img-thumbnail mx-1" width="70" alt="Thumbnail">
                        @endforeach
                    @endif
                </div>
            </div>
            <!-- Detail Section -->
            <div class="col-md-7">
                <div class="card-body">
                    <h3 class="card-title text-primary">{{ $car->name }}</h3>
                    <h4 class="text-success">Rp{{ number_format($car->price, 0, ',', '.') }}/hari</h4>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Merek mobil:</strong> {{ $car->merek->name }}</p>
                            <p><strong>Jenis mobil:</strong> {{ $car->type }}</p>
                            <p><strong>Tahun pembuatan:</strong> {{ $car->manufacture_year }}</p>
                            <p><strong>Plat:</strong> {{ $car->plat }}</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Jenis bahan bakar:</strong> {{ $car->fuel_type }}</p>
                            <p><strong>Jenis transmisi:</strong> {{ $car->type_transmisi }}</p>
                            <p><strong>Muatan orang:</strong> {{ $car->passenger_capacity }}</p>
                            <p><strong>Muatan koper:</strong> {{ $car->luggage_capacity }}</p>
                        </div>
                    </div>
                    <p><strong>Deskripsi:</strong></p>
                    <p class="text-muted">{{ $car->description }}</p>

                    <div class="d-flex mt-3">
                        @if ($car->stock > 0)

                        @if (Auth()->user()->hasRole('user'))
                            <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#pesanModal">
                                Pesan Sekarang
                            </button>
                    
                        @endif

                        @else
                            <button type="button" class="btn btn-danger me-3" disabled>
                                Stok Habis
                            </button>
                        @endif

                        <form action="{{route('car_likes.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="car_id" value="{{$car->id}}">
                            <button type="submit" class="btn btn-outline-warning">
                                <i class="fas fa-heart"></i> Suka
                            </button>
                        </  form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Review Section -->
    <div class="card p-4 shadow">
        <h4 class="text-primary">Review</h4>
        <div class="d-flex align-items-center mb-4">
            <h1 class="display-4 text-success me-3">4.6</h1>
            <div>
                <div class="star-rating text-warning">
                    ★★★★☆
                </div>
                <p class="mb-0 text-muted">5 Rating</p>
            </div>
        </div>
        <div class="progress mb-2" style="height: 8px;">
            <div class="progress-bar bg-warning" style="width: 80%;"></div>
        </div>
        <p class="mb-0">Ulasan positif dari pengguna</p>
    </div>

    <a href="{{ route('halamanutama') }}" class="btn btn-secondary mt-4">Kembali ke Daftar Mobil</a>
</div>


<!-- Modal for Booking -->
<div class="modal fade" id="pesanModal" tabindex="-1" aria-labelledby="pesanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title" id="pesanModalLabel">Form Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="{{ route('bookings.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf <!-- CSRF Token untuk keamanan -->

                    <!-- Car ID (Hidden Input) -->
                    <input type="hidden" name="car_id" value="{{ $car->id }}">

                    <!-- Order Date -->
                    <div class="mb-3">
                        <label for="order_date" class="form-label"><strong>Tanggal Pesanan</strong></label>
                        <input type="date" class="form-control @error('order_date') is-invalid @enderror" 
                               id="order_date" name="order_date" 
                               value="{{ old('order_date') }}" required>
                        @error('order_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Return Date -->
                    <div class="mb-3">
                        <label for="return_date" class="form-label"><strong>Tanggal Pengembalian</strong></label>
                        <input type="date" class="form-control @error('return_date') is-invalid @enderror" 
                               id="return_date" name="return_date" 
                               value="{{ old('return_date') }}" required>
                        @error('return_date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Upload KTP -->
                    {{-- <div class="mb-3">
                        <label for="ktp" class="form-label"><strong>Upload KTP</strong></label>
                        <input type="file" class="form-control @error('ktp') is-invalid @enderror" 
                               id="ktp" name="ktp" required>
                        @error('ktp')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> --}}

                    <!-- Upload SIM -->
                    {{-- <div class="mb-3">
                        <label for="sim" class="form-label"><strong>Upload SIM</strong></label>
                        <input type="file" class="form-control @error('sim') is-invalid @enderror" 
                               id="sim" name="sim" required>
                        @error('sim')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> --}}

                    <!-- Payment Method -->
                    {{-- <div class="mb-3">
                        <label for="payment_method" class="form-label"><strong>Metode Pembayaran</strong></label>
                        <select name="payment_method" id="payment_method" 
                                class="form-select @error('payment_method') is-invalid @enderror" required>
                            <option value="" disabled selected>Pilih Metode Pembayaran</option>
                            <option value="transfer_bank">Transfer Bank</option>
                            <option value="kartu_kredit">Kartu Kredit</option>
                            <option value="e_wallet">E-Wallet</option>
                        </select>
                        @error('payment_method')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> --}}

                    <!-- Agreement -->
                    {{-- <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="agreement" required>
                        <label class="form-check-label" for="agreement">
                            Saya setuju dengan <a href="#" class="text-decoration-underline">syarat dan ketentuan</a>.
                        </label>
                    </div> --}}

                    <!-- Submit Button -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Konfirmasi Pesanan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
