@extends('layouts.template')


@section('title', 'Daftar Promosi')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Daftar Promosi</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <div class="mb-3">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="bi bi-plus-circle me-1"></i> Tambah Mobil Baru
            </button>
        </div>

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
                        <td>
                            <img src="{{ asset('storage/' . $item->photo) }}" alt="Photo"
                                style="width: 100px; height: auto;">
                        </td>
                        <td>{{ $item->start_date }}</td>
                        <td>{{ $item->end_date }}</td>
                        <td>
                            {{-- <a href="{{ route('Promosi.show', $item->id) }}" class="btn btn-info btn-sm">Lihat</a> --}}
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#edit{{$item->id}}">edit</button>
                            {{-- <a href="{{ route('Promosi.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a> --}}
                            <form action="{{ route('Promosi.destroy', $item->id) }}" method="POST"
                                style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data promosi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Pagination -->

    </div>
    @include('promosi.modal')
@endsection
