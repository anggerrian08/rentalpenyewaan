@extends('layouts.template') 

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">Daftar Booking</h1>
    
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="{{ route('bookings.create') }}" class="btn btn-primary">Tambah Booking</a>
        @if(session('success'))
            <div class="alert alert-success w-50">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover align-middle">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Nama User</th>
                    <th>Mobil</th>
                    <th>KTP</th>
                    <th>SIM</th>
                    <th>Tanggal Pesan</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Denda</th>
                    {{-- <th>Aksi</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->car->name }}</td>
                        <td class="text-center">
                            <img src="{{ asset('storage/uploads/ktp/'. $booking->user->ktp) }}" 
                                 alt="KTP" 
                                 class="img-thumbnail" 
                                 style="width: 100px; height: auto;">
                        </td>
                        <td class="text-center">
                            <img src="{{ asset('storage/uploads/sim/'. $booking->user->sim) }}" 
                                 alt="SIM" 
                                 class="img-thumbnail" 
                                 style="width: 100px; height: auto;">
                        </td>
                        <td>{{ $booking->order_date }}</td>
                        <td>{{ $booking->return_date }}</td>
                        <td class="text-center">
                            @if ($booking->status == "borrowed")
                                <span class="badge bg-success" 
                                      type="button" 
                                      data-bs-toggle="modal" 
                                      data-bs-target="#borrowedModal{{ $booking->id }}">
                                    Borrowed
                                </span>
                            @elseif($booking->status == "rejected")
                                <span class="badge bg-danger">Rejected</span>
                            @elseif($booking->status == "in_process")
                                <span class="badge bg-warning text-dark">Process</span>
                            @elseif($booking->status == "returned")
                                <span class="badge bg-primary">Dikembalikan</span>
                            @elseif($booking->status == "late")
                                <span class="badge bg-danger">Late</span>
                            @endif
                        </td>
                        <td class="text-end">Rp. {{ number_format($booking->denda, 0, ',', '.') }}</td>
                        {{-- <td class="text-center">
                            @if ($booking->status == 'in_process')
                                <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" class="d-inline">
                                    <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus booking ini?')">Hapus</button>
                                </form>
                            @endif
                            @if ($booking->status == 'returned')
                                <button type="button" class="btn btn-info btn-sm">Beri Review</button>
                            @endif
                        </td> --}}
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
</div>
@endsection
