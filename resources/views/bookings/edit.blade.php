@extends('layouts.template')

@section('content')
<div class="container">
    <h1>Edit Booking</h1>

    <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="user_id" class="form-label">Pilih User</label>
            <select name="user_id" id="user_id" class="form-select" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $booking->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="car_id" class="form-label">Pilih Mobil</label>
            <select name="car_id" id="car_id" class="form-select" required>
                @foreach($cars as $car)
                    <option value="{{ $car->id }}" {{ $booking->car_id == $car->id ? 'selected' : '' }}>
                        {{ $car->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="ktp" class="form-label">Nomor KTP</label>
            <input type="text" name="ktp" id="ktp" class="form-control" value="{{ $booking->ktp }}">
        </div>

        <div class="mb-3">
            <label for="sim" class="form-label">Nomor SIM</label>
            <input type="text" name="sim" id="sim" class="form-control" value="{{ $booking->sim }}">
        </div>

        <div class="mb-3">
            <label for="order_date" class="form-label">Tanggal Pesan</label>
            <input type="date" name="order_date" id="order_date" class="form-control" value="{{ $booking->order_date }}" required>
        </div>

        <div class="mb-3">
            <label for="return_date" class="form-label">Tanggal Kembali</label>
            <input type="date" name="return_date" id="return_date" class="form-control" value="{{ $booking->return_date }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-select" required>
                <option value="in_process" {{ $booking->status == 'in_process' ? 'selected' : '' }}>Dalam Proses</option>
                <option value="borrowed" {{ $booking->status == 'borrowed' ? 'selected' : '' }}>Dipinjam</option>
                <option value="returned" {{ $booking->status == 'returned' ? 'selected' : '' }}>Dikembalikan</option>
                <option value="late" {{ $booking->status == 'late' ? 'selected' : '' }}>Terlambat</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    </form>
</div>
@endsection
