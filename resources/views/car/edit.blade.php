@extends('layouts.template')

@section('content')
    <div class="container mt-5">


        <style>
            .kotak-biru {
                border-radius: 10px;
                background: linear-gradient(90deg, #15B9FF 33.4%, #0D6EFD 100%);
                padding: 20px;
                margin: 10px;
                max-height: 85px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .card {
                border-radius: 10px;
                margin: 10px;
                box-shadow: 0 4px 6px rgba(77, 76, 76, 0.1);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 6px 10px rgba(55, 54, 54, 0.2);
            }

            .card-img-top {
                border-radius: 10px 10px 0 0;
            }

            .card-title {
                font-weight: bold;
                font-size: 1.2em;
            }

            .card-text {
                font-size: 0.9em;
                color: #6c757d;
            }

            .text-white {
                color: #fff !important;
            }

            .mb-1 {
                margin-bottom: 5px;
            }

            .mb-0 {
                margin-bottom: 0;
            }

            .fw-bold {
                font-weight: bold;
            }

            .alert-warning {
                border-radius: 10px;
                padding: 20px;
                margin: 10px;
                background-color: #fff3cd;
                color: #856404;
                border: 1px solid #ffeeba;
            }
        </style>
        <span></span>


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

        <!-- Card 1: Kotak Biru -->
        <div class="kotak-biru">
            <div class="d-flex justify-content align-items-start mb-3">
                <div>
                    <h2 class="text-white fw-bold mb-1">Edit Jenis Mobil</h2>
                    <p class="text-white fw-bold mb-0" style="font-size: 0.9rem;">Menu | Edit Jenis mobil</p>
                </div>
            </div>
        </div>


        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif --}}
        <div class="row align-items-center">
            <div class="col-md-12 mt">
                <div class="card">
                    <!-- Form Edit -->
                    <form action="{{ route('car.update', $car->id) }}" method="POST" enctype="multipart/form-data"
                        class="container p-4 border rounded bg-white shadow text-black">
                        @csrf
                        @method('PUT')

                        <div class="row g-4">
                            <!-- Merk Mobil -->
                            <div class="col-md-6">
                                <label for="merek_id" class="form-label">Merk Mobil</label>
                                <select name="merek_id" id="merek_id" class="form-select">
                                    <option value="" disabled selected>Pilih Merk</option>
                                    @foreach ($data_merek as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ $car->merek_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('merek_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Nama Mobil -->
                            <div class="col-md-6">
                                <label for="name" class="form-label">Nama Mobil</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name', $car->name) }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Jenis Transmisi -->
                            <div class="col-md-6">
                                <label for="type_transmisi" class="form-label">Jenis Transmisi</label>
                                <select name="type_transmisi" id="type_transmisi" class="form-select">
                                    <option value="" disabled selected>-- Pilih --</option>
                                    @foreach (['Transmisi Manual', 'Otomatis Konvensional', 'Otomatis CVT', 'DCT', 'AMT'] as $type)
                                        <option value="{{ $type }}"
                                            {{ old('type_transmisi', $car->type_transmisi) == $type ? 'selected' : '' }}>
                                            {{ $type }}</option>
                                    @endforeach
                                </select>
                                @error('type_transmisi')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col md-6">
                                <label for="stock" class="form-label">Stock</label>
                                <input type="number" name="stock" id="stock" class="form-control"
                                    value="{{ old('stock', $car->stock) }}">
                            </div>

                            <!-- Tahun Pembuatan -->
                            <div class="col-md-6">
                                <label for="manufacture_year" class="form-label">Tahun Pembuatan</label>
                                <input type="date" name="manufacture_year" id="manufacture_year" class="form-control"
                                    value="{{ old('manufacture_year', $car->manufacture_year) }}">
                                    @error('manufacture_year')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Plat -->
                            <div class="col-md-6">
                                <label for="plat" class="form-label">Plat</label>
                                <input type="text" name="plat" id="plat" class="form-control"
                                    value="{{ old('plat', $car->plat) }}">
                                @error('plat')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Jenis Bahan Bakar -->
                            <div class="col-md-6">
                                <label for="fuel_type" class="form-label">Jenis Bahan Bakar</label>
                                <select name="fuel_type" id="fuel_type" class="form-control">
                                    <option value="" disabled selected>-- Pilih --</option>
                                    @foreach (['bensin', 'solar', 'bio solar', 'cng', 'kendaraan listrik'] as $fuel)
                                        <option value="{{ $fuel }}"
                                            {{ old('fuel_type', $car->fuel_type) == $fuel ? 'selected' : '' }}>
                                            {{ $fuel }}</option>
                                    @endforeach
                                </select>
                                @error('fuel_type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Kapasitas Penumpang -->
                            <div class="col-md-6">
                                <label for="passenger_capacity" class="form-label">Muat Orang</label>
                                <input type="number" name="passenger_capacity" id="passenger_capacity" class="form-control"
                                    value="{{ old('passenger_capacity', $car->passenger_capacity) }}">
                                @error('passenger_capacity')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Kapasitas Koper -->
                            <div class="col-md-6">
                                <label for="luggage_capacity" class="form-label">Muat Koper</label>
                                <input type="number" name="luggage_capacity" id="luggage_capacity" class="form-control"
                                    value="{{ old('luggage_capacity', $car->luggage_capacity) }}">
                                @error('luggage_capacity')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tarif/Harga -->
                            <div class="col-md-6">
                                <label for="price" class="form-label">Tarif/Harga</label>
                                <input type="text" name="price" id="price" class="form-control"
                                    value="{{ old('price', $car->price) }}">
                                @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <!-- Best Choice -->
                            <div class="col-md-6">
                                <label for="best_choice" class="form-label">Pilihan Terbaik</label>
                                <select name="best_choice" id="best_choice" class="form-select">
                                    <option value="" disabled>-- Pilih --</option>
                                    <option value="1"
                                        {{ (old('best_choice') ?? $car->best_choice) == '1' ? 'selected' : '' }}>Iya
                                    </option>
                                    <option value="2"
                                        {{ (old('best_choice') ?? $car->best_choice) == '2' ? 'selected' : '' }}>Tidak
                                    </option>
                                </select>
                                @error('best_choice')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>

                            <!-- Deskripsi -->
                            <div class="col-12">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea name="description" id="description" rows="4" class="form-control">{{ old('description', $car->description) }}</textarea>

                            </div>

                            <!-- Foto Mobil -->
                            <div class="col-12">
                                <label for="photo" class="form-label">Foto Mobil</label>
                                <input type="file" name="photo" id="photo" class="form-control">
                                <small class="text-muted">Kosongkan jika tidak ingin mengganti foto</small>
                                <div class="mt-3">
                                    <img src="{{ asset('storage/uploads/car/' . $car->photo) }}" alt="Car Photo"
                                        class="img-thumbnail" style="height: 100px; width: auto;">
                                </div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <a href="{{ route('car.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>
@endsection
