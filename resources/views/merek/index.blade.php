@extends('layouts.template')

@section('content') <br>
<!-- Include modal.blade.php -->
@include('merek.modal')

<style>

    .kotak-biru {
        border-radius: 10px;
        background: linear-gradient(90deg, #15B9FF 33.4%, #0D6EFD 100%);
        padding: 20px; /* Ukuran padding lebih kecil */
        margin: 10px;   /* Margin kecil */
        max-height: 85px;   /* Lebar maksimum kotak */
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Bayangan lebih halus */
    }

    .card {
        border-radius: 10px;
        margin: 10px; /* Menambahkan jarak antar kotak */
        box-shadow: 0 4px 6px rgba(77, 76, 76, 0.1); /* Efek bayangan */
        transition: transform 0.3s ease, box-shadow 0.3s ease; /* Animasi saat hover */
    }

    .card:hover {
        transform: translateY(-5px); /* Kotak naik sedikit saat hover */
        box-shadow: 0 6px 10px rgba(55, 54, 54, 0.2); /* Bayangan lebih tegas */
    }

    .card-img-top {
        border-radius: 10px 10px 0 0; /* Membulatkan sudut gambar atas */
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
        color: #fff !important; /* Warna putih untuk teks */
    }

    .mb-1 {
        margin-bottom: 5px; /* Margin lebih kecil untuk heading */
    }

    .mb-0 {
        margin-bottom: 0; /* Hilangkan margin bawah */
    }
    .fw-bold {
        font-weight: bold; /* Membuat teks menjadi bold */
    }

</style>


<!-- Card 1: Kotak Biru -->
<div class="kotak-biru">
    <div class="d-flex justify-content-between align-items-start mb-3">
        <!-- Heading "Merk Mobil" -->
        <div>
            <h2 class="text-white fw-bold mb-1">Merk Mobil</h2>
            <p class="text-white fw-bold mb-0" style="font-size: 0.9rem;">Menu | List merk mobil</p>
        </div>
    </div>
</div>

<!-- Card 2: Input dan Tombol -->
<div class="card p-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <!-- Input dengan ikon cari -->
        <div class="input-group w-25">
            <span class="input-group-text" id="search-icon">
                <i class="fa fa-search"></i> <!-- Ikon cari -->
            </span>
            <input type="text" class="form-control" placeholder="Cari merk mobil" aria-label="Cari merk mobil" aria-describedby="search-icon">
        </div>
        <!-- Tombol Tambah Kategori -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="bi bi-plus-circle me-1"></i> Tambah Mobil Baru
        </button>
    </div>
</div>

    <div class="row">
        @foreach($data as $merk)
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
        @endforeach
    </div>
</div>

<!-- Pagination -->
<div class="mt-4">
    <div class="d-flex justify-content-center">
        {{ $data->links('pagination.custom') }}
    </div>
</div>

@endsection
