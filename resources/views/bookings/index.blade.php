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
                        <img src="{{ asset('storage/uploads/ktp/'. $booking->user->ktp) }}" alt="" height="100px">
                    </td>
                    <td>
                        <img src="{{ asset('storage/uploads/sim/'. $booking->user->sim) }}" alt="" height="100px">
                    </td>
                    <td>{{ $booking->order_date }}</td>
                    <td>{{ $booking->return_date }}</td>
                    <td>
                        @if ($booking->status == "borrowed")
                            <div 
                                class="badge badge-success" 
                                type="button" 
                                data-bs-toggle="modal" 
                                data-bs-target="#borrowedModal{{ $booking->id }}"
                            >
                                borrowed
                            </div> 
                        @elseif($booking->status == "rejected")
                            <div class="badge badge-danger">rejected</div> 
                        @elseif($booking->status == "in_process")
                            <div class="badge badge-warning">process</div> 
                        @elseif($booking->status == "returned")
                            <div class="badge badge-success">dikembalikan</div> 
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus booking ini?')">Hapus</button>
                        </form>
                        @if ($booking->status == 'returned')
                            <button type="button" class="btn btn-info btn-sm">Beri Review</button>
                        @endif
                    </td>
                </tr>

                <!-- Modal untuk status borrowed -->
                @if ($booking->status == 'borrowed')
                    <div class="modal fade" id="borrowedModal{{ $booking->id }}" tabindex="-1" aria-labelledby="borrowedModalLabel{{ $booking->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="borrowedModalLabel{{ $booking->id }}">Detail Borrowed</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Nama User:</strong> {{ $booking->user->name }}</p>
                                    <p><strong>Mobil:</strong> {{ $booking->car->name }}</p>
                                    <p><strong>Tanggal Pesan:</strong> {{ $booking->order_date }}</p>
                                    <p><strong>Tanggal Kembali:</strong> {{ $booking->return_date }}</p>
                                    <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
                                    <!-- Tambahkan informasi lain jika diperlukan -->
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('bookings.proses_pengembalian', $booking->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-primary">Ubah Status ke In Process</button>
                                    </form>
                                    
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
