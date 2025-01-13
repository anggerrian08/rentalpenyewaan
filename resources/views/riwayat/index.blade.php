@extends('layouts.navuser')

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

    <br>
    <br>

    <div class="container">
        <!-- Card: Kotak Biru -->
        <div class="kotak-biru">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <h2 class="text-white fw-bold mb-1">Riwayat Transaksi</h2>
                    <p class="text-white fw-bold mb-0" style="font-size: 0.9rem;">Menu | Riwayat Transaksi</p>
                </div>
            </div>
        </div>

        <!-- Search Section -->
        <div class="col-md-2 p-0 text-end ms-5">
            <form action="{{ route('car.index') }}" method="GET" style="border: 1px solid #00000017; display:flex; flex-direction:row; padding:8px; border-radius: 8px;">
                <span id="search-icon">
                    <i class="fa fa-search" style="padding-left: 4px; color:#00000040; padding-right: 6px;"></i>
                </span>
                <input type="text" style="border: none;" placeholder="Cari jenis mobil..." aria-label="Search" name="search">
            </form>
        </div>

        <!-- Table Section -->
        <div class="col-sm-12 mt-3">
            <div class="card">
                <div class="card-block row">
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                        <div class="table-responsive custom-scrollbar">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Mobil</th>
                                        <th>Tanggal Pinjam</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Durasi Rental (Hari)</th>
                                        <th>Total Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Tambahkan data di sini --}}
                                    {{-- Contoh penggunaan forelse untuk iterasi data --}}
                                    {{--
                                    @forelse ($cars as $car)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $car->jenis_mobil }}</td>
                                            <td>{{ $car->tanggal_pinjam }}</td>
                                            <td>{{ $car->tanggal_kembali }}</td>
                                            <td>{{ $car->durasi }}</td>
                                            <td>Rp.{{ number_format($car->total_harga, 0, ',', '.') }}</td>
                                            <td>
                                                <a href="{{ route('car.show', $car->id) }}">Detail</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Data tidak ditemukan.</td>
                                        </tr>
                                    @endforelse
                                    --}}
                                </tbody>
                            </table>
                            <hr style="border-bottom: 1px solid #7a7979; margin: 10px 0;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
