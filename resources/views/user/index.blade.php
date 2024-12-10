@extends('layouts.template')
@section('content')
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
    <span>
    </span>
    <head>
        <!-- Card 1: Kotak Biru -->
<div class="kotak-biru">
    <div class="d-flex justify-content-between align-items-start mb-3">
        <!-- Heading "Merk Mobil" -->
        <div>
            <h2 class="text-white fw-bold mb-1">Daftar User</h2>
            <p class="text-white fw-bold mb-0" style="font-size: 0.9rem;">User | Daftar User</p>
        </div>
    </div>
</div>
<body>
        <div class="col-md-12 project-list">
            <div class="card">
                <div class="col-md-12 project-list">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <!-- Kolom untuk filter -->
                                <form class="d-flex justify-content-between" method="GET" action="{{ route('user.index') }}">
                                    <!-- Dropdown filter -->
                                    <select name="gender" class="form-select me-2" aria-label="Filter Jenis Kelamin">
                                        <option value="" selected>Filter Jenis Kelamin</option>
                                        <option value="laki-laki">Laki-laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                
                                    <!-- Kolom untuk search -->
                                    <div class="input-group me-2">
                                        <span class="input-group-text" id="search-icon">
                                            <i class="fa fa-search" style="color:#00000040;"></i>
                                        </span>
                                        <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan email..." aria-label="Search">
                                    </div>
                
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-12 mt-3">
                    {{-- <div class="card"> --}}
                    <div class="card-block row">
                        <div class="col-sm-12 col-lg-12 col-xl-12">
                            <div class="table-responsive custom-scrollbar">
                                <table class="table table-light">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Nik</th>
                                            <th scope="col">Umur</th>
                                            <th scope="col">Jenis Kelamin</th>
                                            <th scope="col">No Hp</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tbody>
                                            @forelse ($data as $isi)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $isi->name }}</td>
                                                    <td>{{ $isi->nik }}</td>
                                                    <td>{{ $isi->birth_date }}</td>
                                                    <td>{{ $isi->jk }}</td>
                                                    <td>{{ $isi->phone_number }}</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <button style="position: relative; right:20px" type="button" class="btn btn-info btn-sm p-1" data-bs-toggle="modal" data-bs-target="#show{{ $isi->id }}">
                                                                <i class="fa fa-eye" style="font-size: 15px;"></i>
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center btn btn-danger">Tidak ada data</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                </table>
                                <hr style="border-bottom: 1px solid #7a7979; margin: 10px 0;">
                                </hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>
    <!-- Pagination -->
    <div class="row mt-3">
        <div class="col-md-12 text-center">
            <nav>
                <ul class="pagination justify-content-end">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>


    @foreach ($data as $isi)
    <!-- Modal Detail User -->
    <div class="modal fade" id="show{{ $isi->id }}" tabindex="-1" aria-labelledby="showLabel{{ $isi->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="showLabel{{ $isi->id }}">Detail User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama</th>
                            <td>{{ $isi->name }}</td>
                        </tr>
                        <tr>
                            <th>NIK</th>
                            <td>{{ $isi->nik }}</td>
                        </tr>
                        <tr>
                            <th>Umur</th>
                            <td>{{ $isi->birt_date }}</td>
                        </tr>
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>{{ $isi->jk }}</td>
                        </tr>
                        <tr>
                            <th>No Hp</th>
                            <td>{{ $isi->phone_number }}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{ $isi->address }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $isi->email }}</td>
                        </tr>
                        <tr>
                            <th>photo</th>
                            <td><img src="{{asset('storage/uploads/photo/'. $isi->photo)}}" alt="" height="100px"></td>
                        </tr>
                        <tr>
                            <th>ktp</th>
                            <td><img src="{{asset('storage/uploads/ktp/'. $isi->ktp)}}" alt="" height="100px"></td>
                        </tr>
                        <tr>
                            <th>sim</th>
                            <td><img src="{{asset('storage/uploads/sim/'. $isi->sim)}}" alt="" height="100px"></td>
                        </tr>
                        <tr>
                            <th>status</th>
                            <td class="badge btn-">{{$isi->status}}</td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <form action="{{ route('user.destroy', $isi->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE') <!-- Menggunakan PATCH untuk update -->
                        <button class="btn btn-danger" type="submit">hapus</button>
                    </form>
        
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Detail User -->
@endforeach
@endsection
