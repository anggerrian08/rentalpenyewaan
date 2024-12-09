@extends('layouts.template')

@section('content') <br>
<!-- Include modal.blade.php -->
@include('merek.modal')

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

<!-- Card 1: Kotak Biru -->
<div class="kotak-biru">
    <div class="d-flex justify-content-between align-items-start mb-3">
        <div>
            <h2 class="text-white fw-bold mb-1">Merk Mobil</h2>
            <p class="text-white fw-bold mb-0" style="font-size: 0.9rem;">Menu | List merk mobil</p>
        </div>
    </div>
</div>

<!-- Card 2: Input dan Tombol -->
<div class="card p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="col-md-2 p-0 text-end">
            <form action="{{route('merek.index')}}" style="border: 1px solid #00000017; display:flex; flex-direction:row; padding:8px;border-radius: 8px;">
                <span id="search-icon">
                    <i class="fa fa-search" style="padding-left: 4px;color:#00000040; padding-right: 6px;"></i>
                </span>
                <input type="text" style="border: none;" placeholder="Cari merk mobil..." aria-label="Search" name="search">
            </form>
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="bi bi-plus-circle me-1"></i> Tambah Mobil Baru
        </button>
    </div>
</div>

<!-- Daftar Merk Mobil -->
<div class="row">
    @forelse($data as $merk)
        <div class="col-md-3 mb-3">
            <div class="card">
                <img src="{{ asset('uploads/mobil/'.$merk->logo) }}" class="card-img-top" alt="{{ $merk->nama }}">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <img src="{{ asset('assets/images/logo/merek.jpg') }}" alt="" height="45px" class="me-2">
                        <h4 class="card-title m-0">{{ $merk->name }}</h4>
                    </div>
                    <hr style="border-bottom: 1px solid #7a7979; margin: 10px 0;">
                    <div>
                        <td>{{ \Carbon\Carbon::parse($merk->created_add)->translatedFormat('l, d F Y') }}</td>
                    </div>
                    <div class="d-flex justify-content-end">
                        <form action="{{ route('merek.destroy', $merk->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm me-2 p-1">
                                <i class="fa fa-trash" style="font-size: 15px;"></i>
                            </button>
                        </form>
                        <button type="button" class="btn btn-warning btn-sm p-1" data-bs-toggle="modal" data-bs-target="#edit{{ $merk->id }}">
                            <i class="fa fa-edit" style="font-size: 15px;"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-warning text-center">
            <strong>Data tidak tersedia.</strong> Tambahkan data untuk mulai mengelola merk mobil.
        </div>
    @endforelse
</div>

<!-- Pagination -->
<div class="mt-4">
    <div class="d-flex justify-content-center">
        {{ $data->links() }}
    </div>
</div>

@endsection
