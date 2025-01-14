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
        }

        .table-custom th,
        .table-custom td {
            padding: 8px 15px;
            vertical-align: top;
        }

        .image-preview {
            max-width: 150px;
            max-height: 100px;
            object-fit: cover;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
    </style>
    <br>
    <!-- Header -->
    <div class="kotak-biru">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2 class="text-white fw-bold mb-1">Approval Sewa</h2>
                <p class="text-white mb-0">Transaksi | Approval Sewa</p>
            </div>
        </div>
    </div>

    <!-- Card Konten -->
    <div class="col-md-12">
        <div class="card p-4">
            <div class="row">
                <!-- Data Penyewa -->
                <div class="col-md-6">
                    <table class="table table-borderless table-custom">
                        <tr>
                            <th>Nama Penyewa</th>
                            <td>{{ $aproval->booking->user->name }}</td>
                        </tr>
                        <tr>
                            <th>NIK</th>
                            <td>{{ $aproval->booking->user->nik }}</td>
                        </tr>
                        <tr>
                            <th>No HP</th>
                            <td>{{ $aproval->booking->user->phone_number }}</td>
                        </tr>

                        <tr>
                            <th>Alamat</th>
                            <td>{{ $aproval->booking->user->address }}</td>
                        </tr>
                    </table>
                </div>

                <!-- Foto KTP dan SIM -->
                <div class="col-md-6 text-center">
                    <div class="mb-3">
                        <strong>Foto KTP</strong>
                        <br>
                        <img src="{{ asset('storage/uploads/ktp/' . $aproval->booking->user->ktp) }}" class="image-preview"
                            alt="Foto KTP">
                    </div>
                    <div>
                        <strong>Foto SIM</strong>
                        <br>
                        <img src="{{ asset('storage/uploads/sim/' . $aproval->booking->user->sim) }}" class="image-preview"
                            alt="Foto SIM">
                    </div>
                </div>
            </div>

            <!-- Data Pinjaman -->
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-borderless table-custom">
                        <tr>
                            <th>Tanggal Pinjam</th>
                            <td>{{ $aproval->booking->order_date }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Kembali</th>
                            <td>{{ $aproval->booking->return_date }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-borderless table-custom">
                        <tr>
                            <th>Total Hari</th>
                            <td>{{ $aproval->rental_duration_days }}</td>
                        </tr>
                        <tr>
                            <th>Tarif/hari</th>
                            <td>Rp. {{ number_format($aproval->booking->car->price, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Total Tarif</th>
                            <td>Rp. {{ number_format($aproval->total_price, 0, ',', '.') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Tombol Aksi -->
    <div class="d-flex justify-content-end mt-3">
        @if ($aproval->booking->status != 'late' && $aproval->booking->status != 'returned')
            <form action="{{ route('aproval.rejected', $aproval->id) }}" method="post">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-danger me-2">Tolak</button>
            </form>
            <form action="{{ route('aproval.accepted', $aproval->id) }}" method="post">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success me-2">terima</button>
            </form>
        @endif
        @if ($aproval->booking->status == 'late')
            <form action="{{ route('aproval.returned', $aproval->id) }}" method="post">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success me-2">returned</button>
            </form>
        @endif
        <a href="/admin/aproval" class="btn btn-secondary">Kembali</a>
    </div>
@endsection
