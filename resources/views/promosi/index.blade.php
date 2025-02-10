@extends('layouts.template')

@section('title', 'Daftar Promosi')

@section('content')
    <style>
        .kotak-biru {
            border-radius: 10px;
            background: linear-gradient(90deg, #15B9FF 33.4%, #0D6EFD 100%);
            padding: 20px;
            margin: 10px 0;
            max-height: 85px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card {
            border-radius: 10px;
            margin: 10px 0;
            box-shadow: 0 4px 6px rgba(77, 76, 76, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 10px rgba(55, 54, 54, 0.2);
        }

        .card-img-top {
            border-radius: 10px 10px 0 0;
            max-height: 150px;
            object-fit: cover;
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
            margin: 10px 0;
            background-color: #fff3cd;
            color: #856404;
            border: 1px solid #ffeeba;
        }

        .search-container {
            border: 1px solid #00000017;
            display: flex;
            flex-direction: row;
            padding: 8px;
            border-radius: 8px;
        }

        .search-container input {
            border: none;
            flex: 1;
        }

        .search-container i {
            padding-left: 4px;
            color: #00000040;
            padding-right: 6px;
        }
    </style>
    <br>
    <div class="kotak-biru">
        <div class="d-flex justify-content-between align-items-start mb-3">
            <div>
                <h2 class="text-white fw-bold mb-1">Promosi</h2>
                <p class="text-white fw-bold mb-0" style="font-size: 0.9rem;">Menu | Promosi</p>
            </div>
        </div>
    </div>
    <div class="card p-3">
        <div class="d-flex justify-content-between align-items-center flex-wrap">
            <!-- Form Pencarian -->
            <div class="col-md-4 p-0">
                <form action="{{ route('merek.index') }}" class="search-container d-flex align-items-center">
                    <i class="fa fa-search px-2"></i>
                    <input type="text" class="form-control border-0" placeholder="Cari promosi mobil..." name="search">
                </form>
            </div>
    
            <!-- Tombol Tambah & Refresh -->
            <div class="d-flex">
                <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="bi bi-plus-circle me-1"></i> Tambah Promosi
                </button>
    
                <form action="{{ route('promotions.refresh') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-primary" type="submit">
                        <i class="bi bi-arrow-clockwise me-1"></i> Refresh
                    </button>
                </form>
            </div>
        </div>
    </div>
    

    <div class="row">
        @forelse($promosi as $item)
            <div class="col-md-3 mb-3">
                <div class="card">
                    <!-- Foto promosi -->
                    <img src="{{ asset('storage/' . $item->photo) }}" class="card-img-top" alt="Foto Promosi">
                    <!-- Tanggal di bawah foto -->
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <div class="card-body p-2">
                            <h4 class="mb-2">{{$item->title}}</h4>
                            <p class="card-text text-start mb-0">
                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d-M-Y') }}
                            </p>
                        </div>
                        <div class="d-flex">
                            <!-- Tombol hapus -->
                            <form action="{{ route('promosi.destroy', $item->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-icon btn-delete btn btn-danger btn-sm me-2 p-1">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                            <!-- Tombol edit -->
                            <button type="button" class="btn-icon btn-edit btn btn-warning btn-sm p-1"
                                data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}">
                                <i class="fa fa-edit"></i>
                            </button>
                            <!-- Tombol detail -->
                            <button type="button" class="btn-icon btn-edit btn btn-success btn-sm p-1 ms-2"
                                 data-bs-toggle="modal" data-bs-target="#detail{{ $item->id }}">
                                <i class="fa fa-info-circle"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center" style="margin-top: 70px;">
                <img src="{{ asset('assets/images/logo/notdata.png') }}" width="200px" alt="">
                <p class="text-muted">Tidak ada data promosi yang tersedia.</p>
            </div>
        @endforelse
    </div>
    @include('promosi.modal')
@endsection
