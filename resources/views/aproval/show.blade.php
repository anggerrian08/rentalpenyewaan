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
            padding: 12px 20px;
            vertical-align: top;
        }

        .table-custom th {
            font-size: 1.1rem;
        }

        .table-custom td {
            font-size: 1rem;
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
                <h2 class="text-white fw-bold mb-1">Persetujuan Sewa</h2>
                <p class="text-white mb-0">Transaksi | Persetujuan Sewa</p>
            </div>
        </div>
    </div>

    <!-- Card Konten -->
    <div class="col-md-12">
        <div class="card p-4 shadow-lg" style="border-radius: 10px; background-color: #f8f9fa;">
            <div class="row">
                <!-- Data Penyewa -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <strong class="d-block" style="color: #6c757d; font-size: 1.25rem;">Nama Penyewa</strong>
                        <span class="text-muted" style="font-size: 1.15rem;">{{ $aproval->booking->user->name }}</span>
                    </div>
                    <div class="mb-3">
                        <strong class="d-block" style="color: #6c757d; font-size: 1.25rem;">NIK</strong>
                        <span class="text-muted" style="font-size: 1.15rem;">{{ $aproval->booking->user->nik }}</span>
                    </div>
                    <div class="mb-3">
                        <strong class="d-block" style="color: #6c757d; font-size: 1.25rem;">No HP</strong>
                        <span class="text-muted"
                            style="font-size: 1.15rem;">{{ $aproval->booking->user->phone_number }}</span>
                    </div>
                    <div class="mb-3">
                        <strong class="d-block" style="color: #6c757d; font-size: 1.25rem;">Alamat</strong>
                        <span class="text-muted" style="font-size: 1.15rem;">{{ $aproval->booking->user->address }}</span>
                    </div>
                </div>

                <!-- Foto KTP dan SIM -->
                <div class="col-md-6 text-center">
                    <div class="mb-4">
                        <strong class="d-block mb-2" style="font-size: 1.3rem; color: #495057;">Foto KTP</strong>
                        <img src="{{ asset('storage/uploads/ktp/' . $aproval->booking->user->ktp) }}" class="img-fluid mb-3"
                            alt="Foto KTP"
                            style="width:150px; height: 100px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    </div>
                    <div>
                        <strong class="d-block mb-2" style="font-size: 1.3rem; color: #495057;">Foto SIM</strong>
                        <img src="{{ asset('storage/uploads/sim/' . $aproval->booking->user->sim) }}" class="img-fluid"
                            alt="Foto SIM"
                            style="width:150px; height: 100px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    </div>
                </div>
            </div>

            <!-- Data Pinjaman -->
            {{-- <hr style="border-top: 2px solid #e0e0e0;"> --}}
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <strong class="d-block" style="color: #6c757d; font-size: 1.25rem;">Tanggal Pinjam</strong>
                        <span class="text-muted" style="font-size: 1.15rem;">{{ $aproval->booking->order_date }}</span>
                    </div>
                    <div class="mb-3">
                        <strong class="d-block" style="color: #6c757d; font-size: 1.25rem;">Tanggal Kembali</strong>
                        <span class="text-muted" style="font-size: 1.15rem;">{{ $aproval->booking->return_date }}</span>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <strong class="d-block" style="color: #6c757d; font-size: 1.25rem;">Total Hari</strong>
                        <span class="text-muted" style="font-size: 1.15rem;">{{ $aproval->rental_duration_days }}</span>
                    </div>
                    <div class="mb-3">
                        <strong class="d-block" style="color: #6c757d; font-size: 1.25rem;">Tarif/hari</strong>
                        <span class="text-muted" style="font-size: 1.15rem;">Rp.
                            {{ number_format($aproval->booking->car->price, 0, ',', '.') }}</span>
                    </div>
                    {{-- <hr style="border-top: 2px solid #e0e0e0;"> --}}
                    {{-- <div class="mb-3">
                        <strong class="d-block" style="color: #6c757d; font-size: 1.25rem;">Total Tarif</strong>
                        <span class="text-muted" style="font-size: 1.15rem;">Rp.
                            {{ number_format($aproval->total_price, 0, ',', '.') }}</span>
                    </div> --}}
                </div>

                <div class="col-md-6">
                    {{-- <div class="mb-3">
                        <strong class="d-block" style="color: #6c757d; font-size: 1.25rem;">Total Hari</strong>
                        <span class="text-muted" style="font-size: 1.15rem;">{{ $aproval->rental_duration_days }}</span>
                    </div>
                    <div class="mb-3">
                        <strong class="d-block" style="color: #6c757d; font-size: 1.25rem;">Tarif/hari</strong>
                        <span class="text-muted" style="font-size: 1.15rem;">Rp.
                            {{ number_format($aproval->booking->car->price, 0, ',', '.') }}</span>
                    </div> --}}
                    {{-- <hr style="border-top: 2px solid #e0e0e0;"> --}}
                    <div class="mb-3">
                        <strong class="d-block" style="color: #6c757d; font-size: 1.25rem;">Total Tarif</strong>
                        <span class="text-muted" style="font-size: 1.15rem;">Rp.
                            {{ number_format($aproval->total_price, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="d-flex justify-content-end mt-4">
        @if ($aproval->booking->status == 'in_process' || $aproval->booking->status == 'rejected')
            <form action="{{ route('aproval.rejected', $aproval->id) }}" method="post">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-danger me-2">Tolak</button>
            </form>
            <form action="{{ route('aproval.accepted', $aproval->id) }}" method="post">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success me-2">Terima</button>
            </form>
        @endif
        @if ($aproval->booking->status == 'borrowed')
            <form action="{{ route('aproval.returned', $aproval->id) }}" method="post">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success me-2">Returned</button>
            </form>
        @endif
        <a href="/admin/aproval" class="btn btn-secondary">Kembali</a>
    </div>
    </div>
    </div>




    <!-- Tombol Aksi -->
@endsection
