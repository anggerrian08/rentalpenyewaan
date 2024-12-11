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

    <h2 class="mb-4">Daftar Mobil</h2>

    <!-- Form Pencarian -->
    <form method="GET" action="{{ route('car.index') }}" class="mb-4">
        <div class="row">
            <div class="col-md-10">
                <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama">
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Cari</button>
            </div>
        </div>
    </form>


    <form method="GET" action="{{ route('car.filter') }}" class="mb-4">
        <div class="row">
            <div class="col-md-10">
                <select name="filter" class="form-control">
                    <option value="" disabled selected>Pilih Merek</option>
                    @foreach ($merek as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Filter</button>
            </div>
        </div>
    </form>


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
