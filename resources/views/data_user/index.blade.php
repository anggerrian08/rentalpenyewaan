@extends('layouts.template')
@section('content')
    <style>
        /* Custom styles for the page */
    </style>
    <div class="col-md-12 project-list">
        <div class="card" style="background: linear-gradient(90deg, #15B9FF 33.4%, #0D6EFD 100%); color: white;">
            <div class="row align-items-center">
                <div class="col-md-6 p-0">
                    <h2>Daftar User</h2>
                    <h6>User | Daftar User</h6>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12 project-list">
        <div class="card">
            <div class="col-sm-12 mt-3">
                <div class="table-responsive custom-scrollbar">
                    <table class="table table-light">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Umur</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">No Hp</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->nama }}</td>
                                <td>{{ $user->nik }}</td>
                                <td>{{ $user->umur }}</td>
                                <td>{{ $user->jenis_kelamin }}</td>
                                <td>{{ $user->no_hp }}</td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#showModal{{ $user->id }}">👁️</button>
                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}">🗑️</button>
                                </td>
                            </tr>
                        
                            <!-- Modal for Show User Details -->
                            <div class="modal fade" id="showModal{{ $user->id }}" tabindex="-1" aria-labelledby="showModalLabel{{ $user->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="showModalLabel{{ $user->id }}">Detail User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p><strong>Nama:</strong> {{ $user->nama }}</p>
                                            <p><strong>NIK:</strong> {{ $user->nik }}</p>
                                            <p><strong>Umur:</strong> {{ $user->umur }}</p>
                                            <p><strong>Jenis Kelamin:</strong> {{ $user->jenis_kelamin }}</p>
                                            <p><strong>No Hp:</strong> {{ $user->no_hp }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                            <!-- Modal for Delete Confirmation -->
                            <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $user->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $user->id }}">Konfirmasi Hapus</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah Anda yakin ingin menghapus user <strong>{{ $user->nama }}</strong>?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
