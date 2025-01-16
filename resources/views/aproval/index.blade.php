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
    <br>

    <!-- Header -->
    <div class="kotak-biru">
        <div class="d-flex justify-content-between align-items-start mb-3">
            <div>
                <h2 class="text-white fw-bold mb-1">Approval Sewa</h2>
                <p class="text-white fw-bold mb-0" style="font-size: 0.9rem;">Menu | Approval Sewa</p>
            </div>
        </div>
    </div>

    <!-- Filter dan Search -->
    <div class="col-md-12 project-list">
        <div class="card">
            <div class="row align-items-center">
                <div class="col-md-2 p-0 text-end">
                    <form action="{{ route('aproval.index') }}" method="GET" class="d-flex justify-content-end">
                        <select class="form-select me-2" name="filter" onchange="this.form.submit()">
                            <option value="" {{ $filter == '' ? 'selected' : '' }}>Filter</option>
                            <option value="a-z" {{ $filter == 'a-z' ? 'selected' : '' }}>A-Z</option>
                            <option value="z-a" {{ $filter == 'z-a' ? 'selected' : '' }}>Z-A</option>
                        </select>
                    </form>
                </div>

                <div class="col-md-2 p-0 text-end">
                    <form action="{{ route('aproval.index') }}" method="GET" style="border: 1px solid #00000017; display:flex; flex-direction:row; padding:8px; border-radius: 8px;">
                        <i class="fa fa-search" style="padding-left: 4px; color:#00000040; padding-right: 6px;"></i>
                        <input type="text" name="search" value="{{ $search }}" style="border: none;" placeholder="Cari email..." aria-label="Search">
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
                            @forelse ($data as $item)
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
                                                'late' => 'danger'
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
                                            {{-- <button type="button" class="btn btn-primary btn-sm p-1" data-bs-toggle="modal" data-bs-target="#payModal{{ $item->id }}">
                                                <i class="fa fa-credit-card" style="font-size: 15px;"></i>
                                            </button> --}}
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
                    {{ $data->links() }}
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
