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

            .search-container {
                display: flex;
                
                justify-content: center;
                margin-top: 20px;
            }

            .search-form {
                display: flex;
                gap: 10px;
                align-items: center;
                flex-wrap: wrap;
            }

            .form-group {
                display: flex;
                flex-direction: column;
                margin-right: 10px;
            }

            .form-control {
                padding: 8px;
                font-size: 14px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            .Fbtn-primary {
                padding: 10px 20px;
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 5px;
                cursor: pointer;
            }

            .btn-primary:hover {
                background-color: #0056b3;
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
        <div class="search-container">
            <form action="/search" method="GET" class="search-form">
                <div class="form-group">
                    <label for="pinjam">Pinjam</label>
                    <input type="date" id="pinjam" name="pinjam" class="form-control">
                </div>
                <div class="form-group">
                    <label for="kembali">Kembali</label>
                    <input type="date" id="kembali" name="kembali" class="form-control">
                </div>
                <div class="form-group">
                    <label for="merk">Filter Merk</label>
                    <select id="merk" name="merk" class="form-control">
                        <option value="">Pilih Merk</option>
                        <option value="merk1">Merk 1</option>
                        <option value="merk2">Merk 2</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="jenis">Filter Jenis</label>
                    <select id="jenis" name="jenis" class="form-control">
                        <option value="">Pilih Jenis</option>
                        <option value="jenis1">Jenis 1</option>
                        <option value="jenis2">Jenis 2</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="cari">Cari</label>
                    <input type="text" id="cari" name="cari" placeholder="Cari" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </div>
            </form>
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
