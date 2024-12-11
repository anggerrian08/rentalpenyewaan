@extends('layouts.template')

@section('content')
<div class="container">
    <h1>Tambah Booking Baru</h1>

    <form action="{{ route('bookings.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="user_id" class="form-label">Pilih User</label>
            <select name="user_id" id="user_id" class="form-select" required>
                <option value="">-- Pilih User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="car_id" class="form-label">Pilih Mobil</label>
            <select name="car_id" id="car_id" class="form-select" required>
                <option value="">-- Pilih Mobil --</option>
                @foreach($cars as $car)
                    <option value="{{ $car->id }}">{{ $car->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="ktp" class="form-label">Nomor KTP</label>
            <input type="text" name="ktp" id="ktp" class="form-control">
        </div>

        <div class="mb-3">
            <label for="sim" class="form-label">Nomor SIM</label>
            <input type="text" name="sim" id="sim" class="form-control">
        </div>

        <div class="mb-3">
            <label for="order_date" class="form-label">Tanggal Pesan</label>
            <input type="date" name="order_date" id="order_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="return_date" class="form-label">Tanggal Kembali</label>
            <input type="date" name="return_date" id="return_date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="in_process">Dalam Proses</option>
                <option value="borrowed">Dipinjam</option>
                <option value="returned">Dikembalikan</option>
                <option value="late">Terlambat</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
