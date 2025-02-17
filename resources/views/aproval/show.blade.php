@extends('layouts.template')
@section('content')
    <script>
        function confirmReturn(event, formId) {
            event.preventDefault(); // Mencegah form dikirim langsung

            Swal.fire({
                title: "Apakah Anda yakin?",
                text: "Anda ingin mengembalikan mobil ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#28a745",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, kembalikan!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(formId).submit();
                }
            });
        }
    </script>
    @if ($aproval->status == 'in_process')
        <style>
            .kotak-biru {
                border-radius: 10px;
                background: linear-gradient(90deg, #FFD95F 33.4%, #ffe99f 100%);
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
    @elseif($aproval->status == 'borrowed' || $aproval->status == 'returned')
        <style>
            .kotak-biru {
                border-radius: 10px;
                background: linear-gradient(90deg, #32c354 33.4%, #99ff7d 100%);
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
    @elseif($aproval->status == 'late' || $aproval->status == 'rejected')
        <style>
            .kotak-biru {
                border-radius: 10px;
                background: linear-gradient(90deg, #da2d44 33.4%, #fd7a8b 100%);
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
    @endif
    {{-- <style>
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
        </style> --}}

    <br>
    <!-- Header -->
    @if ($aproval->status == 'in_process')
        <div class="kotak-biru">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="text-white fw-bold mb-1">Status : @if ($aproval->status == 'in_process')
                            In Process
                        @endif
                    </h2>
                </div>
            </div>
        </div>
    @elseif($aproval->status == 'borrowed' || $aproval->status == 'returned')
        <div class="kotak-biru">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="text-white fw-bold mb-1">Status : {{ ucwords($aproval->status) }}</h2>
                </div>
            </div>
        </div>
    @elseif($aproval->status == 'late' || $aproval->status == 'rejected')
        <div class="kotak-biru">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h2 class="text-white fw-bold mb-1">Status : {{ ucwords($aproval->status) }}</h2>
                </div>
            </div>
        </div>
    @endif

    <!-- Card Konten -->
    <div class="col-md-12">
        <div class="card p-4 shadow-lg" style="border-radius: 10px; background-color: #f8f9fa;">
            <div class="row">
                <!-- Data Penyewa -->
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <strong class="d-block text-dark fs-5">Nama Penyewa</strong>
                                <span class="text-muted fs-6">{{ $aproval->user->name }}</span>
                            </div>
                            <div class="mb-3">
                                <strong class="d-block text-dark fs-5">No HP</strong>
                                <span class="text-muted fs-6">{{ $aproval->user->phone_number }}</span>
                            </div>
                            <div class="mb-3">
                                <strong class="d-block text-dark fs-5">Alamat</strong>
                                <span class="text-muted fs-6">{{ $aproval->user->address }}</span>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <strong class="d-block text-dark fs-5">NIK</strong>
                                <span class="text-muted fs-6">{{ $aproval->user->nik }}</span>
                            </div>
                            <div class="mb-3">
                                <strong class="d-block text-dark fs-5">Tanggal Pinjam</strong>
                                <span class="text-muted fs-6">{{ $aproval->order_date }}</span>
                            </div>
                            <div class="mb-3">
                                <strong class="d-block text-dark fs-5">Tanggal Kembali</strong>
                                <span class="text-muted fs-6">{{ $aproval->return_date }}</span>
                            </div>
                            @if ($aproval->status == 'rejected')
                                <div class="mb-3">
                                    <strong class="d-block text-dark fs-5">Alasan Ditolak</strong>
                                    @if ($aproval->reason == null)
                                        <span class="text-muted fs-6">Mobil Dipinjam Orang lain</span>
                                    @endif
                                    <span class="text-muted fs-6">{{ $aproval->reason }}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>


                <!-- Foto KTP dan SIM -->
                <div class="col-md-3">
                    <div class="mb-4">
                        <strong class="d-block text-dark fs-5 mb-2">Foto KTP</strong>
                        <img src="{{ asset('storage/uploads/ktp/' . $aproval->user->ktp) }}"
                            class="img-fluid rounded shadow-sm" alt="Foto KTP" style="width: 220px; height: 110px">
                    </div>
                    <div>
                        <strong class="d-block text-dark fs-5 mb-2">Foto SIM</strong>
                        <img src="{{ asset('storage/uploads/sim/' . $aproval->user->sim) }}"
                            class="img-fluid rounded shadow-sm" alt="Foto SIM" style="width: 220px; height: 110px;">
                    </div>
                </div>
            </div>


            <hr>



            <!-- Tombol Aksi -->
            <div class="d-flex justify-content-between mt-4">
                <div class="mb-3">
                    <strong class="d-block text-dark fs-5">Total Hari</strong>
                    <span class="text-muted fs-6">{{ $aproval->detailPembayaran->rental_duration_days }}</span>
                </div>
                <div class="mb-3">
                    <strong class="d-block text-dark fs-5">Tarif/hari</strong>
                    <span class="text-muted fs-6">Rp. {{ number_format($aproval->car->price, 0, ',', '.') }}</span>
                </div>
                <div>
                    <strong class="d-block" style="color: #000000; font-size: 1.25rem;">Total Tarif</strong>
                    <span class="text-muted" style="font-size: 1.15rem;">Rp.
                        {{ number_format($aproval->detailPembayaran->total_price, 0, ',', '.') }}</span>
                </div>


                <div class="d-flex">
                    @if ($aproval->status == 'in_process')
                        <button type="buttton" data-bs-toggle="modal" data-bs-target="#tolak{{ $aproval->id }}"
                            class="btn btn-danger me-2">Tolak</button>
                        <form action="{{ route('aproval.accepted', $aproval->id) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-success me-2">Terima</button>
                        </form>
                    @endif

                    @if ($aproval->status == 'borrowed' || $aproval->status == 'late')
                        <form id="returnForm-{{ $aproval->id }}" action="{{ route('aproval.returned', $aproval->id) }}"
                            method="post">
                            @csrf
                            @method('PATCH')
                            <button type="button" class="btn btn-success me-2"
                                onclick="confirmReturn(event, 'returnForm-{{ $aproval->id }}')">Returned</button>
                        </form>
                    @endif
                    <a href="/admin/aproval" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>

    </div>
    </div>




    {{-- modal toalk --}}
    <div class="modal fade" id="tolak{{ $aproval->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal Alsan ditolak</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('aproval.rejected', $aproval->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <label for="" class="form-label">Alasan Ditolak</label>
                        <input type="text" name="reason" class="form-control" value="{{ request('reason') }}">
                        @error('reason')
                             <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- modal toalk --}}
    <div class="modal fade" id="tolak{{ $aproval->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('aproval.rejected', $aproval->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <label for="" class="form-label">Alasan Ditolak</label>
                        <input type="text" name="reason" class="form-control" value="{{ request('reason') }}">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Tombol Aksi -->
@endsection
