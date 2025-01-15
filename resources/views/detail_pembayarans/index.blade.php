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
                <div class="col-md-2 p-0 text-end">
                    <form action="{{ route('detail_pembayarans.index') }}"
                        style="border: 1px solid #00000017; display:flex; flex-direction:row; padding:8px;border-radius: 8px;">
                        <span id="search-icon">
                            <i class="fa fa-search" style="padding-left: 4px;color:#00000040; padding-right: 6px;"></i>
                        </span>
                        <input type="text" style="border: none;" placeholder="Cari detail pembayaran..."
                            aria-label="Search" name="search">
                    </form>
                </div>
            </div>
        </div>


        <div class="card p-3">

            <div class="col-sm-12 mt-3">
                <div class="card-block row">
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                        <div class="table-responsive custom-scrollbar">
                            <table class="table">
                                <tr>
                                    <th>No</th>
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
                                    @forelse ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->booking_id }}</td>
                                            <td>{{ $item->booking->user->email ?? '-' }}</td> <!-- Email user -->
                                            <td>{{ \Carbon\Carbon::parse($item->booking->order_date)->translatedFormat('d-M-Y') }}
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($item->booking->return_date)->translatedFormat('d-M-Y') ?? '-' }}
                                            </td> <!-- Format tanggal kembali -->
                                            <td>{{ $item->rental_duration_days }}</td>
                                            <td>{{ number_format($item->total_price, 0, ',', '.') }}</td> <!-- Format harga -->
                                            <td>
                                                <button type="button" class="btn btn-info btn-sm"> <i class="bi bi-eye"></i>
                                                    Detail</button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="8" class="text-center">
                                                <img src="{{ asset('assets/images/logo/tidakada.png') }}" width="500px"
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

        </div>
    @endsection
