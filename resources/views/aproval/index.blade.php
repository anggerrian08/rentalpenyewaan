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

        /* .card:hover {
                                transform: translateY(-5px);
                                box-shadow: 0 6px 10px rgba(55, 54, 54, 0.2);
                            } */

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

        .search-container {
            border: 1px solid rgba(0, 0, 0, 0.1);
            background-color: #fff;
            display: flex;
            align-items: center;
            padding: 4px 8px;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 100%;
            /* Agar container menyesuaikan */
            max-width: 250px;
            /* Membatasi lebar maksimal */
        }

        .search-container:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .search-container i {
            color: rgba(0, 0, 0, 0.4);
            margin-right: 10px;
            font-size: 16px;
        }

        .search-container input {
            border: none;
            outline: none;
            flex: 1;
            font-size: 14px;
            color: #333;
            background: transparent;
            padding: 4px;
        }

        .search-container input {
            border: none;
            outline: none;
            flex: 1;
            font-size: 14px;
            color: #333;
            background: transparent;
            padding: 4px;
            max-width: 120px;
            /* Membatasi input agar tidak melampaui box */
            overflow: hidden;
            /* Menyembunyikan teks yang melebihi box */
            text-overflow: ellipsis;
            /* Memberikan efek "..." jika teks terlalu panjang */
            white-space: nowrap;
            /* Mencegah teks menjadi multiline */
        }
    </style>
    <br>

    <!-- Header -->
    <div class="kotak-biru">
        <div class="d-flex justify-content-between align-items-start mb-3">
            <div>
                <h2 class="text-white fw-bold mb-1">Persetujuan Sewa</h2>
                <p class="text-white fw-bold mb-0" style="font-size: 0.9rem;">Menu | Persetujuan Sewa</p>
            </div>
        </div>
    </div>
 
    
    <!-- Filter dan Search -->
    <div class="col-md-12 project-list">
        <div class="card">
            <div class="row align-items-center">
                <div class="row align-items-center mb-3">
                    <div class="col-md-3">
                        <form action="{{ route('aproval.index') }}" method="GET">
                            <select class="form-select" name="filter" onchange="this.form.submit()">
                                <option value="a-z" {{ $filter == 'a-z' ? 'selected' : '' }}>Terbaru</option>
                                <option value="z-a" {{ $filter == 'z-a' ? 'selected' : '' }}>Terlama</option>
                            </select>
                        </form>
                    </div>
                
                    <div class="col-md-3">
                        <form action="{{ route('aproval.index') }}" method="GET">
                            <input type="text" class="form-control" name="filter_no_telpon"
                                   placeholder="Cari no telepon..." value="{{ $filter_no_telpon }}">
                        </form>
                    </div>
                
                    <div class="col-md-3">
                        <form action="{{ route('aproval.index') }}" method="GET">
                            <select class="form-select" name="filter_status" onchange="this.form.submit()">
                                <option value="" {{ $filter_status == '' ? 'selected' : '' }}>Filter Status</option>
                                <option value="borrowed" {{ $filter_status == 'borrowed' ? 'selected' : '' }}>Borrowed</option>
                                <option value="returned" {{ $filter_status == 'returned' ? 'selected' : '' }}>Returned</option>
                                <option value="late" {{ $filter_status == 'late' ? 'selected' : '' }}>Late</option>
                                <option value="in_process" {{ $filter_status == 'in_process' ? 'selected' : '' }}>In Process</option>
                                <option value="rejected" {{ $filter_status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </form>
                    </div>
                
                    <div class="col-md-3 d-flex">
                        <form action="{{ route('aproval.index') }}" method="GET" class="d-flex me-2">
                            <input type="text" class="form-control" name="search" placeholder="Cari email..." value="{{ $search }}">
                            <button type="submit" class="btn btn-primary ms-2">Cari</button>
                        </form>
                        <form action="{{ route('aproval.refres') }}" method="POST">
                            @csrf
                            <button class="btn btn-outline-primary ms-2" type="submit">Refresh</button>
                        </form>
                    </div>
                </div>
                
    
                <!-- Tabel Data -->
                <div class="col-sm-12 mt-3">
                    <div class="table-responsive custom-scrollbar p-3">
                        <table class="table ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Email</th>
                                    <th>Mobil</th>
                                    <th>NIK</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No HP</th>
                                    <th>Status</th>
                                    <th>Denda</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bookings as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->user->email }}</td>
                                        <td>{{ $item->car->name }}</td>
                                        <td>{{ $item->user->nik }}</td>
                                        <td>{{ $item->user->jk }}</td>
                                        <td>{{ $item->user->phone_number }}</td>
                                        <td>
                                            @php
                                                $statusClass = [
                                                    'borrowed' => 'success',
                                                    'rejected' => 'danger',
                                                    'in_process' => 'warning',
                                                    'returned' => 'success',
                                                    'late' => 'danger',
                                                ];
                                            @endphp
                                            <div class="badge badge-{{ $statusClass[$item->status] ?? 'secondary' }}">
                                                {{ ucfirst(str_replace('_', ' ', $item->status)) }}
                                            </div>
                                        </td>
                                        <td>Rp. {{ number_format($item->denda, 0, ',', '.') }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('aproval.show', $item->id) }}" class="btn btn-info btn-sm p-1">
                                                    <i class="fa fa-eye" style="font-size: 15px;"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">
                                            <img src="{{ asset('assets/images/logo/tidakada.png') }}" width="500px" alt="">
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
    
                <!-- Pagination -->
                <div class="row mt-3">
                    <div class="col-md-12 text-center">
                        {{ $bookings->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    

        <!-- Modal Pembayaran -->
        {{-- @foreach ($data as $item)
        <div class="modal fade" id="payModal{{ $item->id }}" tabindex="-1" aria-labelledby="payModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('aproval.pay', $item->id) }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="payModalLabel{{ $item->id }}">Pembayaran Denda</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Detail Pembayaran untuk <strong>{{ $item->user->email }}</strong></p>
                            <div class="mb-3">
                                <label class="form-label">Total Denda</label>
                                <input type="text" class="form-control" value="Rp. {{ number_format($item->denda, 0, ',', '.') }}" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="amount{{ $item->id }}" class="form-label">Jumlah yang Dibayarkan</label>
                                <input type="number" class="form-control" id="amount{{ $item->id }}" name="amount" placeholder="Masukkan jumlah pembayaran" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success">Bayar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach --}}
    @endsection
