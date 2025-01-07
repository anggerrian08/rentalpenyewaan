@extends('layouts.template')

@section('content')
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
    <br>
    <!-- Card 1: Kotak Biru -->
    <div class="kotak-biru">
        <div class="d-flex justify-content align-items-start mb-3">
            <div>
                <h2 class="text-white fw-bold mb-1">Tambah Booking Mobil</h2>
                <p class="text-white fw-bold mb-0" style="font-size: 0.9rem;">Menu | Tambah Booking Mobil</p>
            </div>
        </div>
    </div>



    <div class="row align-items-center">
        <div class="col-md-12 mt">
            <div class="card">
                <!-- Form Create -->
                <form action="{{ route('bookings.store') }}" method="POST" enctype="multipart/form-data"
                    class="container p-4 border rounded bg-white shadow text-black">
                    @csrf
                    <div class="row g-4">
                        <div class="col-md-6">
                            <label for="user_id" class="form-label">Pilih User</label>
                            <select name="user_id" id="user_id" class="form-select" required>
                                <option value="">-- Pilih User --</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="car_id" class="form-label">Pilih Mobil</label>
                            <select name="car_id" id="car_id" class="form-select" required>
                                <option value="">-- Pilih Mobil --</option>
                                @foreach ($cars as $car)
                                    <option value="{{ $car->id }}">{{ $car->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="ktp" class="form-label">Nomor KTP</label>
                            <input type="text" name="ktp" id="ktp" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label for="sim" class="form-label">Nomor SIM</label>
                            <input type="text" name="sim" id="sim" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label for="order_date" class="form-label">Tanggal Pesan</label>
                            <input type="date" name="order_date" id="order_date" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label for="return_date" class="form-label">Tanggal Kembali</label>
                            <input type="date" name="return_date" id="return_date" class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-select" required>
                                <option value="in_process">Dalam Proses</option>
                                <option value="borrowed">Dipinjam</option>
                                <option value="returned">Dikembalikan</option>
                                <option value="late">Terlambat</option>
                            </select>
                        </div>

                    </div>
                    <!-- Buttons -->
                    <div class="d-flex justify-content-end gap-2 mt-4">
                        <a href="{{ route('bookings.index') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
            </div>
            </form>
        @endsection
