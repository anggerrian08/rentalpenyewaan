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
    </style>
    <!-- Card 1: Kotak Biru -->
    <div class="kotak-biru">
        <div class="d-flex justify-content-between align-items-start mb-3">
            <div>
                <h2 class="text-white fw-bold mb-1">Promosi</h2>
                <p class="text-white fw-bold mb-0" style="font-size: 0.9rem;">Menu | Promosi</p>
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
                <input type="text" style="border: none;" placeholder="Cari promosi mobil..." aria-label="Search" name="search">
            </form>
        </div>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="bi bi-plus-circle me-1"></i> Tambah Promosi Baru
        </button>
    </div>
</div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto Promosi</th>
                <th>Mulai</th>
                <th>Selesai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($promosi as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->start_date }}</td>
                    <td>{{ $item->end_date }}</td>
                    {{-- <td>{{ number_format($item->price, 0, ',', '.') }}</td> --}}
                    <td>
                        @if ($item->photo)
                            <img src="{{ asset('storage/' . $item->photo) }}" alt="{{ $item->name }}" width="100">
                        @else
                            <span class="text-muted">Tidak ada foto</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('promosi.show', $item->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('promosi.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('promosi.destroy', $item->id) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
    <div class="text-center">
        <img src="{{ asset('assets/images/logo/tidakada.png') }}" width="500px" alt="">
    </div>
    @if ($promosi->isNotEmpty())
    <div class="mt-3">
        {{ $promosi->links() }}
    </div>
@else
@endif
    </div>
@endsection
