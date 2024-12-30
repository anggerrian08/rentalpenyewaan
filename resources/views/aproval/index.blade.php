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
</style>

<!-- Kotak Biru Header -->
<div class="kotak-biru">
    <div class="d-flex justify-content-between align-items-start mb-3">
        <div>
            <h2 class="text-white fw-bold mb-1">Approval User</h2>
            <p class="text-white fw-bold mb-0" style="font-size: 0.9rem;">Menu | Approval User</p>
        </div>
    </div>
</div>

{{-- <div class="col-md-12 project-list">
    <div class="card">
        <div class="row align-items-center">
            <!-- Filter Dropdown -->
            <div class="col-md-2 p-0 text-end">
                <form class="d-flex justify-content-end">
                    <select class="form-select me-2" aria-label="Filter Merk Mobil">
                        <option value="" selected>Filter</option>
                        <option value="a-z">A-Z</option>
                        <option value="z-a">Z-A</option>
                        <option value="terbaru">Terbaru</option>
                        <option value="terlama">Terlama</option>
                    </select>
                </form>

            </div>
        </div> --}}

        <div class="col-md-12 project-list">
            <div class="card">
                <div class="row align-items-center">
                    <!-- Kolom untuk filter -->
                    <div class="col-md-2 p-0 text-end">
                        <form class="d-flex justify-content-end">
                            <!-- Dropdown filter -->
                            <select class="form-select me-2" aria-label="Filter Merk Mobil">
                                <option value="" selected>Filter</option>
                                <option value="a-z">A-Z</option>
                                <option value="z-a">Z-A</option>
                                <option value="terbaru">Terbaru</option>
                                <option value="terlama">Terlama</option>
                            </select>
                        </form>
                    </div>


            <!-- Search Bar -->
            <div class="col-md-2 p-0 text-end">
                <form action="" style="border: 1px solid #00000017; display:flex; flex-direction:row; padding:8px;border-radius: 8px;">
                    <span id="search-icon">
                        <i class="fa fa-search" style="padding-left: 4px;color:#00000040; padding-right: 6px;"></i>
                    </span>
                    <input type="text" style="border: none;" placeholder="Cari approval user..." aria-label="Search">
                </form>
            </div>

            <!-- Approve Button -->
            {{-- <div class="col-md-2 p-0 text-end" style="margin-left:570px;">
                <button type="button" class="btn btn-success">Terima</button>
            </div> --}}
        </div>

        <!-- Table for Showing Data -->
        <div class="col-sm-12 mt-3">
            <div class="card-block row">
                <div class="col-sm-12 col-lg-12 col-xl-12">
                    <div class="table-responsive custom-scrollbar">
                        <table class="table table-light">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Email</th>
                                    <th>Mobil</th>
                                    <th scope="col">Nik</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">No Hp</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->user->email }}</td>
                                        <th>{{$item->car->name}}</th>
                                        <td>{{ $item->user->nik }}</td>
                                        <td>{{ $item->user->jk }}</td>
                                        <td>{{ $item->user->phone_number }}</td>
                                        <td>
                                            @if ($item->status == "borrowed")
                                                <div class="badge badge-success">borrowed</div>
                                            @elseif($item->status == "rejected")
                                                <div class="badge badge-danger">ditolak</div>
                                            @elseif($item->status == "in_process")
                                                <div class="badge badge-warning">process</div>
                                            @elseif($item->status == 'returned')
                                                <div class="badge badge-success">dikembalikan</div>
                                            @elseif($item->status == 'late')
                                                <div class="badge badge-danger">late</div>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <!-- Modal Trigger Button -->
                                                <button type="button" class="btn btn-info btn-sm p-1" data-bs-toggle="modal" data-bs-target="#show{{ $item->user->id }}">
                                                    <i class="fa fa-eye" style="font-size: 15px;"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Modal for Each Item -->
@foreach ($data as $item)
<div class="modal fade" id="show{{ $item->user->id }}" tabindex="-1" aria-labelledby="showModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showModalLabel">Detail Booking</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Email:</strong> {{ $item->user->email }}</p>
                <p><strong>Mobil:</strong> {{ $item->car->name }}</p>
                <p><strong>Status:</strong> {{ $item->status }}</p>
                <!-- Add more details as necessary -->
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- Pagination -->
<div class="row mt-3">
    <div class="col-md-12 text-center">
        <nav>
            <ul class="pagination justify-content-end">
                {{ $data->links() }}
            </ul>
        </nav>
    </div>
</div>

@endsection
