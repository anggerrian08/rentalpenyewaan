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

<!-- Card 1: Kotak Biru -->
<div class="kotak-biru">
    <div class="d-flex justify-content-between align-items-start mb-3">
        <div>
            <h2 class="text-white fw-bold mb-1">Booking</h2>
            <p class="text-white fw-bold mb-0" style="font-size: 0.9rem;">Menu | Booking</p>
        </div>
    </div>
</div>

<div class="card p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="col-md-2 p-0 text-end">
            <form action="{{route('merek.index')}}" style="border: 1px solid #00000017; display:flex; flex-direction:row; padding:8px;border-radius: 8px;">
                <span id="search-icon">
                    <i class="fa fa-search" style="padding-left: 4px;color:#00000040; padding-right: 6px;"></i>
                </span>
                <input type="text" style="border: none;" placeholder="Cari merk mobil..." aria-label="Search" name="search">
            </form>
        </div>
        <a href="{{ route('bookings.create') }}" class="btn btn-primary">Tambah Booking</a>
    </div>
</div>



    <div class="col-sm-12 mt-3">
        {{-- <div class="card"> --}}
        <div class="card-block row">
            <div class="col-sm-12 col-lg-12 col-xl-12">
                <div class="table-responsive custom-scrollbar">
                    <table class="table table-light">
                            <tr>
                                <th>No</th>
                                <th>Nama User</th>
                                <th>Mobil</th>
                                <th>KTP</th>
                                <th>SIM</th>
                                <th>Tanggal Pesan</th>
                                <th>Tanggal Kembali</th>
                                <th>Status</th>
                                <th>Denda</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bookings as $booking)
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
                                    <button class="btn btn-success" type="button" data-bs-toggle="modal"
                                        data-bs-target="#borrowedModal{{ $booking->id }}">
                                        Borrowed
                                    </button>
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
                            </tr>

                            <!-- Modal untuk status borrowed -->
                            @if ($booking->status == 'borrowed')
                            <div class="modal fade" id="borrowedModal{{ $booking->id }}" tabindex="-1"
                                aria-labelledby="borrowedModalLabel{{ $booking->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="borrowedModalLabel{{ $booking->id }}">Detail
                                                Borrowed</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Nama User:</strong> {{ $booking->user->name }}</p>
                                            <p><strong>Mobil:</strong> {{ $booking->car->name }}</p>
                                            <p><strong>Tanggal Pesan:</strong> {{ $booking->order_date }}</p>
                                            <p><strong>Tanggal Kembali:</strong> {{ $booking->return_date }}</p>
                                            <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('bookings.proses_pengembalian', $booking->id) }}"
                                                method="POST">
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
                            @empty
                            <tr>
                                <td colspan="9" class="text-center">Tidak ada data booking yang ditemukan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <hr style="border-bottom: 1px solid #7a7979; margin: 10px 0;">
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
