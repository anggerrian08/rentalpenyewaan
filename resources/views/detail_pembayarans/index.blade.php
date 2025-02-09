@extends('layouts.template')

@section('content')
    <div class="mt-5">
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
                    <h2 class="text-white fw-bold mb-1">Detail Pembayaran</h2>
                    <p class="text-white fw-bold mb-0" style="font-size: 0.9rem;">Menu | Detail Pembayaran</p>
                </div>
            </div>
        </div>

        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="w-100">
                    <form action="{{ route('detail_pembayarans.index') }}" method="GET">
                        <div class="row g-2 align-items-center">
                            <!-- Input Pencarian -->
                            <div class="col-md-3">
                                <div class="input-group">
                                    <span class="input-group-text bg-white border-end-0">
                                        <i class="fa fa-search" style="color:#00000040;"></i>
                                    </span>
                                    <input type="text" class="form-control border-start-0"
                                        placeholder="Cari detail pembayaran..." aria-label="Search" name="search" value="{{request('search')}}">
                                </div>
                            </div>

                            <!-- Input Harga Min -->
                            <div class="col-md-2">
                                <input type="number" name="min_price" class="form-control" placeholder="Harga min"  value="{{request('min_price')}}">
                            </div>

                            <!-- Input Harga Max -->
                            <div class="col-md-2">
                                <input type="number" name="max_price" class="form-control" placeholder="Harga max"  value="{{request('max_price')}}">
                            </div>

                            <!-- Input Tanggal Mulai -->
                            <div class="col-md-2">
                                <input type="date" name="start_date" class="form-control" placeholder="Tanggal mulai"  value="{{request('start_date')}}">
                            </div>

                            <!-- Input Tanggal Akhir -->
                            <div class="col-md-3">
                                <div class="input-group">
                                    <input type="date" name="end_date" class="form-control" placeholder="Tanggal akhir"  value="{{request('end_date')}}">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-search me-1"></i> Cari
                                    </button>
                                </div>
                            </div>

                            {{-- <!-- Tombol Cari -->
                            <div class="col-md-1 text-end">
                                <button type="submit" class="btn btn-primary w-10">
                                    <i class="fa fa-search me-1"></i> Cari
                                </button>
                            </div> --}}
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="col-sm-12 col-lg-12 col-xl-12">
                    <div class="table-responsive custom-scrollbar">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    {{-- <th>Id Pemesanan</th> --}}
                                    <th>Email Pengguna</th>
                                    <th>Tanggal Pinjam</th>
                                    <th>Tanggal Kembali</th>
                                    <th>Durasi Rental (Hari)</th>
                                    <th>Total Harga</th>
                                    <th>denda</th>
                                    <th>total bayar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td>{{ $item->booking_id }}</td> --}}
                                        <td>{{ $item->booking->user->email ?? '-' }}</td>
                                        <td>{{ \Carbon\Carbon::parse($item->booking->order_date)->translatedFormat('d-M-Y') }}
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($item->booking->return_date)->translatedFormat('d-M-Y') ?? '-' }}
                                        </td>
                                        <td>{{ $item->rental_duration_days }}</td>
                                        <td>Rp.{{ number_format($item->total_price, 0, ',', '.') }}</td>
                                        <td class="text-danger">
                                            Rp {{ number_format($item->booking->denda ?? 0, 0, ',', '.') }}
                                        </td>
                                        <td class="text-info">
                                            Rp {{ number_format($item->total_pembayaran ?? 0, 0, ',', '.') }}
                                        </td>

                                        <td>
                                            <button type="button" class=""
                                                data-bs-target="#detailPembayaran{{ $item->id }}" style="border: none"
                                                data-bs-toggle="modal">
                                                <img src="Frame 48.svg" alt="Show">
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">
                                            <br><br><br>
                                            <img src="{{ asset('assets/images/logo/notdata.png') }}" width="200px"
                                                alt="">
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($data as $item)
            <div class="modal fade" id="detailPembayaran{{ $item->id }}" tabindex="-1"
                aria-labelledby="detailPembayaranLabel-{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #01A8EF;">
                            <h5 class="modal-title" id="detailPembayaranLabel-{{ $item->id }}" style="color: #fff;">
                                Detail Pembayaran
                            </h5>
                            <button type="button" class="btn-close text-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container">
                                <div class="row border-bottom py-2">
                                    <div class="col-6 fw-bold">Email User</div>
                                    <div class="col-6 text-end">{{ $item->booking->user->email ?? '-' }}</div>
                                </div>
                                <div class="row border-bottom py-2">
                                    <div class="col-6 fw-bold">Tanggal Pinjam</div>
                                    <div class="col-6 text-end">
                                        {{ \Carbon\Carbon::parse($item->booking->order_date)->translatedFormat('d-M-Y') }}
                                    </div>
                                </div>
                                <div class="row border-bottom py-2">
                                    <div class="col-6 fw-bold">Tanggal Kembali</div>
                                    <div class="col-6 text-end">
                                        {{ \Carbon\Carbon::parse($item->booking->return_date)->translatedFormat('d-M-Y') ?? '-' }}
                                    </div>
                                </div>
                                <div class="row border-bottom py-2">
                                    <div class="col-6 fw-bold">Durasi Rental (Hari)</div>
                                    <div class="col-6 text-end">{{ $item->rental_duration_days }}</div>
                                </div>
                                <div class="row border-bottom py-2">
                                    <div class="col-6 fw-bold">Total Harga</div>
                                    <div class="col-6 text-end text-success">
                                        Rp {{ number_format($item->total_price, 0, ',', '.') }}
                                    </div>
                                </div>
                                <div class="row border-bottom py-2">
                                    <div class="col-6 fw-bold">Denda</div>
                                    <div class="col-6 text-end text-danger">
                                        Rp {{ number_format($item->booking->denda ?? 0, 0, ',', '.') }}
                                    </div>
                                </div>
                                <div class="row border-bottom py-2 bg-light fw-bold">
                                    <div class="col-6 " style="color: black">Total Pembayaran</div>
                                    <div class="col-6 text-end text-primary">
                                        Rp {{ number_format($item->total_pembayaran, 0, ',', '.') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer d-flex justify-content-end">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endsection
