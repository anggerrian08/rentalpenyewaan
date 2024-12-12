@extends('layouts.template')

@section('content')

<div class="container mt-5">
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
<span></span>

<!-- Card 1: Kotak Biru -->
<div class="kotak-biru">
    <div class="d-flex justify-content-between align-items-start mb-3">
        <div>
            <h2 class="text-white fw-bold mb-1">List Jenis Mobil</h2>
            <p class="text-white fw-bold mb-0" style="font-size: 0.9rem;">Menu | List jenis mobil</p>
        </div>
    </div>
</div>


    <form method="GET" action="{{ route('car.index') }}">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="filter" id="all" value="all" {{ request('filter') === 'all' ? 'checked' : '' }}>
            <label class="form-check-label" for="all">All</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="filter" id="tersedia" value="tersedia" {{ request('filter') === 'tersedia' ? 'checked' : '' }}>
            <label class="form-check-label" for="tersedia">Tersedia</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="filter" id="tidak_tersedia" value="tidak_tersedia" {{ request('filter') === 'tidak_tersedia' ? 'checked' : '' }}>
            <label class="form-check-label" for="tidak_tersedia">Tidak tersedia</label>
        </div>
        <input type="submit" hidden>
    </form>


    <a href="{{ route('car.create') }}" class="btn btn-primary mb-3">Tambah Mobil</a>

    <table id="carTable" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Tipe Transmisi</th>
                <th>Jenis Bahan Bakar</th>
                <th>Tahun Pembuatan</th>
                <th>Plat</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Kapasitas Penumpang</th>
                <th>Kapasitas Bagasi</th>
                <th>Foto</th>
                <th>Merek</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($cars as $car)
            <tr>
                <td>{{ $car->id }}</td>
                <td>{{ $car->name }}</td>
                <td>{{ $car->description }}</td>
                <td>{{ $car->type_transmisi }}</td>
                <td>{{ $car->fuel_type }}</td>
                <td>{{ $car->manufacture_year }}</td>
                <td>{{ $car->plat }}</td>
                <td>{{ number_format($car->price, 0, ',', '.') }}</td>
                <td>
                    @if ($car->stock > 0)
                        {{ $car->stock }}
                    @else
                        <div class="badge btn-danger">habis</div>
                    @endif
                </td>
                <td>{{ $car->passenger_capacity }}</td>
                <td>{{ $car->luggage_capacity }}</td>
                <td>
                    <img src="{{ asset('storage/uploads/car/' . $car->photo) }}" alt="{{ $car->name }}" style="width: 100px; height: auto;">
                </td>
                <td>{{ $car->merek->name }}</td>
                <td>
                    <a href="{{ route('car.show', $car->id) }}" class="btn btn-info btn-sm">Show</a>
                    <a href="{{ route('car.edit', $car->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('car.destroy', $car->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="14" class="text-center">Tidak ada data mobil yang ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
