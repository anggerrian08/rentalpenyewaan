@extends('template.index')

@section('content')
    <h1>Halaman Plat</h1>
    <div class="card radius-10">
        <div class="card-body">
            <!-- Header dengan tombol tambah dan pencarian -->
            <div class="row mb-3">
                <div class="col-md-6 d-flex align-items-center">
                    <!-- Tombol Tambah Kategori -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        <i class="fa-solid fa-calendar-plus me-1"></i> Tambah Plat
                    </button>
                </div>
                <div class="col-md-3 ms-auto">
                    <!-- Form Pencarian -->
                    <form action="{{route('plat.index')}}" method="GET" class="d-flex">
                        @csrf
                        <input type="text" name="input" class="form-control me-2" placeholder="Cari kategori..." value="{{request('input')}}">
                        <button type="submit" class="btn btn-outline-secondary">
                            <i class="fa-solid fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>

            <!-- Tabel Data -->
            <div class="table-responsive">
                <table class="table align-middle table-hover mb-0" id="example">
                    <thead class="table-light text-center">
                        <tr>
                            <th>No</th>
                            <th>Plat</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                            <tr>
                                <td class="text-center">{{ $loop->iteration + ($data->currentPage() - 1) * $data->perPage() }}</td>
                                <td class="text-center" width="70%">
                                    <span class="badge bg-success text-white shadow-sm w-50">
                                        {{ $item->plat }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <button type="button" class="btn btn-sm btn-success mb-2 me-2" data-bs-toggle="modal" data-bs-target="#edit{{ $item->id }}">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </button>
                                        <form action="{{ route('plat.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus {{ $item->name }}?')" name="archive">
                                                <i class="fa-solid fa-trash-can"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center text-muted">Belum ada kategori yang ditambahkan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <!-- Pagination -->
            <div class="d-flex justify-content-end mt-3">
                {{ $data->links() }}
            </div>
            
        </div>
    </div>
    @include('plat.modal')
@endsection
