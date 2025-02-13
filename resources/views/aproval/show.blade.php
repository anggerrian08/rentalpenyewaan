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
                        <strong class="d-block" style="color: #000000; font-size: 1.25rem;"> Nama Penyewa</strong>
                        <span class="text-muted" style="font-size: 1.15rem;">{{ $aproval->booking->user->name }}</span>
                    </div>
                    <div class="mb-3">
                        <strong class="d-block" style="color: #000000; font-size: 1.25rem;">NIK</strong>
                        <span class="text-muted" style="font-size: 1.15rem;">{{ $aproval->booking->user->nik }}</span>
                    </div>
                    <div class="mb-3">
                        <strong class="d-block" style="color: #000000; font-size: 1.25rem;">No HP</strong>
                        <span class="text-muted"
                            style="font-size: 1.15rem;">{{ $aproval->booking->user->phone_number }}</span>
                    </div>
                    <div class="mb-3">
                        <strong class="d-block" style="color: #000000; font-size: 1.25rem;">Alamat</strong>
                        <span class="text-muted" style="font-size: 1.15rem;">{{ $aproval->booking->user->address }}</span>
                    </div>
                </div>

                <!-- Foto KTP dan SIM -->
                <div class="col-md-6">
                    <div class="mb-4">
                        <strong class="d-block mb-2" style="font-size: 1.3rem; color: #000000;">Foto KTP</strong>
                        <img src="{{ asset('storage/uploads/ktp/' . $aproval->booking->user->ktp) }}" class="img-fluid mb-3"
                            alt="Foto KTP"
                            style="width:150px; height: 100px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    </div>
                    <div>
                        <strong class="d-block mb-2" style="font-size: 1.3rem; color: #000000;">Foto SIM</strong>
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
                        <strong class="d-block" style="color: #000000; font-size: 1.25rem;">Tanggal Pinjam</strong>
                        <span class="text-muted" style="font-size: 1.15rem;">{{ $aproval->booking->order_date }}</span>
                    </div>
                    <div class="mb-3">
                        <strong class="d-block" style="color: #000000; font-size: 1.25rem;">Tanggal Kembali</strong>
                        <span class="text-muted" style="font-size: 1.15rem;">{{ $aproval->booking->return_date }}</span>
                    </div>

                </div>
                @if ($aproval->booking->status == 'rejected')
                <div class="mb-3 bg-danger">
                    <strong class="d-block" style="color: #000000; font-size: 1.25rem;">Alasan di tolak</strong>
                    <span class="text-muted" style="font-size: 1.15rem;">{{ $aproval->booking->reason }}</span>
                </div>
                
                @endif

                <div class="col-md-6">
                    <div class="mb-3">
                        <strong class="d-block" style="color: #000000; font-size: 1.25rem;">Total Hari</strong>
                        <span class="text-muted" style="font-size: 1.15rem;">{{ $aproval->rental_duration_days }}</span>
                    </div>
                    <div class="mb-3">
                        <strong class="d-block" style="color: #000000; font-size: 1.25rem;">Tarif/hari</strong>
                        <span class="text-muted" style="font-size: 1.15rem;">Rp.
                            {{ number_format($aproval->booking->car->price, 0, ',', '.') }}</span>
                    </div>
                    {{-- <hr style="border-top: 2px solid #e0e0e0;"> --}}
                    {{-- <div class="mb-3">
                        <strong class="d-block" style="color: #000000; font-size: 1.25rem;">Total Tarif</strong>
                        <span class="text-muted" style="font-size: 1.15rem;">Rp.
                            {{ number_format($aproval->total_price, 0, ',', '.') }}</span>
                    </div> --}}
                </div>

                <div class="col-md-6">
                    {{-- <div class="mb-3">
                        <strong class="d-block" style="color: #000000; font-size: 1.25rem;">Total Hari</strong>
                        <span class="text-muted" style="font-size: 1.15rem;">{{ $aproval->rental_duration_days }}</span>
                    </div>
                    <div class="mb-3">
                        <strong class="d-block" style="color: #000000; font-size: 1.25rem;">Tarif/hari</strong>
                        <span class="text-muted" style="font-size: 1.15rem;">Rp.
                            {{ number_format($aproval->booking->car->price, 0, ',', '.') }}</span>
                    </div> --}}
                    {{-- <hr style="border-top: 2px solid #e0e0e0;"> --}}

                </div>
            </div>

                            <div class="mb-3"  style="position: relative;top:70px;">
                                <strong class="d-block" style="color: #000000; font-size: 1.25rem;">Total Tarif</strong>
                                <span class="text-muted" style="font-size: 1.15rem;">Rp.
                                    {{ number_format($aproval->total_price, 0, ',', '.') }}</span>
                            </div>
            <div class="d-flex justify-content-end mt-3">

                @if ($aproval->booking->status == 'in_process')
                    {{-- <form action="{{ route('aproval.rejected', $aproval->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                    </form> --}}
                    <button type="buttton" data-bs-toggle="modal" data-bs-target="#tolak{{$aproval->id}}" class="btn btn-danger me-2">Tolak</button>
                    <form action="{{ route('aproval.accepted', $aproval->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success me-2">terima</button>
                    </form>
                @endif

                @if ($aproval->booking->status == 'borrowed' || ($aproval->booking->status == 'late'))
                    <form id="returnForm-{{ $aproval->id }}" action="{{ route('aproval.returned', $aproval->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <button type="button" class="btn btn-success me-2" onclick="confirmReturn(event, 'returnForm-{{ $aproval->id }}')">Returned</button>
                    </form>
                @endif
                <a href="/admin/aproval" class="btn btn-secondary">Kembali</a>
            </div>
        </div>

    </div>

    </div>
    </div>




    {{-- modal toalk--}}
    <div class="modal fade" id="tolak{{$aproval->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <input type="text" name="reason" class="form-control" value="{{request('reason')}}">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>


    {{-- modal toalk--}}
    <div class="modal fade" id="tolak{{$aproval->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <input type="text" name="reason" class="form-control" value="{{request('reason')}}">
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
