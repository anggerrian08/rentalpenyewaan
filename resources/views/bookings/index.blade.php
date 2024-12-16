@extends('layouts.template') 

@section('content')
<div class="container">
    <h1>Daftar Booking</h1>
    <a href="{{ route('bookings.create') }}" class="btn btn-primary mb-3">Tambah Booking</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama User</th>
                <th>Mobil</th>
                <th>KTP</th>
                <th>SIM</th>
                <th>Tanggal Pesan</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->car->name }}</td>
                    <td>
                        <img src="{{asset('storage/uploads/ktp/'. $booking->user->ktp) }}" alt="" height="100px">
                    </td>
                    <td>
                        <img src="{{asset('storage/uploads/sim/'. $booking->user->sim) }}" alt="" height="100px">
                    </td>
                    <td>{{ $booking->order_date }}</td>
                    <td>{{ $booking->return_date }}</td>
                    <td>
                        <p  class="badge badge-warning">
                            {{ $booking->status }}

                        </p>

                    </td>
                    <td>
                        <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus booking ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
