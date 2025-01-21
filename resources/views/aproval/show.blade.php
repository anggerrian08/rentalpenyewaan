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
        <div class="card p-4 shadow-lg" style="border-radius: 10px; background-color: #f8f9fa;">
            <div class="row">
                <!-- Data Penyewa -->
                <div class="col-md-6">
                    <table class="table table-borderless table-custom">
                        <tr>
                            <th class="font-weight-bold" style="color: #6c757d;">Nama Penyewa</th>
                            <td class="text-muted">{{ $aproval->booking->user->name }}</td>
                        </tr>
                        <tr>
                            <th class="font-weight-bold" style="color: #6c757d;">NIK</th>
                            <td class="text-muted">{{ $aproval->booking->user->nik }}</td>
                        </tr>
                        <tr>
                            <th class="font-weight-bold" style="color: #6c757d;">No HP</th>
                            <td class="text-muted">{{ $aproval->booking->user->phone_number }}</td>
                        </tr>
                        <tr>
                            <th class="font-weight-bold" style="color: #6c757d;">Alamat</th>
                            <td class="text-muted">{{ $aproval->booking->user->address }}</td>
                        </tr>
                    </table>
                </div>

                <!-- Foto KTP dan SIM -->
                <div class="col-md-6 text-center">
                    <div class="mb-4">
                        <strong class="d-block mb-2" style="font-size: 1.1rem; color: #495057;">Foto KTP</strong>
                        <img src="{{ asset('storage/uploads/ktp/' . $aproval->booking->user->ktp) }}" class="img-fluid mb-3" alt="Foto KTP"
                            style="width:150px; height: 100px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    </div>
                    <div>
                        <strong class="d-block mb-2" style="font-size: 1.1rem; color: #495057;">Foto SIM</strong>
                        <img src="{{ asset('storage/uploads/sim/' . $aproval->booking->user->sim) }}" class="img-fluid"
                            alt="Foto SIM" style="width:150px; height: 100px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    </div>
                </div>
            </div>

            <!-- Data Pinjaman -->
            <hr style="border-top: 2px solid #e0e0e0;">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-borderless table-custom">
                        <tr>
                            <th class="font-weight-bold" style="color: #6c757d;">Tanggal Pinjam</th>
                            <td class="text-muted">{{ $aproval->booking->order_date }}</td>
                        </tr>
                        <tr>
                            <th class="font-weight-bold" style="color: #6c757d;">Tanggal Kembali</th>
                            <td class="text-muted">{{ $aproval->booking->return_date }}</td>
                        </tr>
                    </table>
                </div>

                <div class="col-md-6">
                    <table class="table table-borderless table-custom">
                        <tr>
                            <th class="font-weight-bold" style="color: #6c757d;">Total Hari</th>
                            <td class="text-muted">{{ $aproval->rental_duration_days }}</td>
                        </tr>
                        <tr>
                            <th class="font-weight-bold" style="color: #6c757d;">Tarif/hari</th>
                            <td class="text-muted">Rp. {{ number_format($aproval->booking->car->price, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th class="font-weight-bold" style="color: #6c757d;">Total Tarif</th>
                            <td class="text-muted">Rp. {{ number_format($aproval->total_price, 0, ',', '.') }}</td>
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
