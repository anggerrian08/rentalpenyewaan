@extends('layouts.template')

@section('content')

<br><br>
<div class="container">
    <h1>Daftar Detail Pembayaran</h1>
    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Booking ID</th>
                <th>Email User</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Durasi Rental (Hari)</th>
                <th>Total Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->booking_id }}</td>
                    <td>{{ $item->booking->user->email ?? '-' }}</td> <!-- Email user -->
                    <td>{{ \Carbon\Carbon::parse($item->booking->order_date)->translatedFormat('d-M-Y') }}</td> 
                    <td>{{ \Carbon\Carbon::parse($item->booking->return_date)->translatedFormat('d-M-Y') ?? '-' }}</td> <!-- Format tanggal kembali -->
                    <td>{{ $item->rental_duration_days }}</td>
                    <td>{{ number_format($item->total_price, 0, ',', '.') }}</td> <!-- Format harga -->
                    <td>
                        <button type="button"  class="btn btn-info btn-sm">  <i class="bi bi-eye"></i> Detail</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
