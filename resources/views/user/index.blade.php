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
                                                    <td>{{ $isi->birt_date }}</td>
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
                                                    <td colspan="12" class="text-center">Tidak ada data user yang ditemukan</td>
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
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-5">
            <div class="modal-header">
                <h5 class="modal-title" id="showLabel{{ $isi->id }}">
                    <img src="{{ asset('assets/images/logo/humma.jpg') }}" alt="" width="200px">
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex align-items-stretch">
                    <!-- Foto Profil -->
                    <div class="me-4 text-center">
                        <img src="{{ asset('storage/uploads/photo/' . $isi->photo) }}" alt="Foto Profil" class="rounded-circle border" width="120" height="120">
                        <h5 class="mt-2">{{ $isi->username }}</h5>
                        <h3 class="mt-1">Eva Maulani</h3>
                        <p class="text-muted">{{ $isi->phone_number }}</p>
                        <div class="d-flex justify-content-center gap-2 mt-2">
                            <button class="btn btn-outline-info" type="button">Email</button>
                            <button class="btn btn-outline-info" type="button">Send</button>
                        </div>
                        <hr class="my-3">
                        <div class="alert alert-success light alert-dismissible fade show text-dark border-left-wrapper" role="alert" style="background-color: rgba(40, 167, 69, 0.2);">
                            <p class="txt-dark"><strong>Tanggal Daftar :</strong> {{ \Carbon\Carbon::parse($isi->created_at)->format('d-m-y') }}</p>
                        </div>
                        <div class="alert alert-info light alert-dismissible fade show text-dark border-left-wrapper" role="alert" style="background-color: rgba(23, 162, 184, 0.2);">
                            <p class="txt-dark"><strong>Terakhir Aktif:</strong> {{ \Carbon\Carbon::parse($isi->updated_at)->format('d-m-y') }}</p>
                        </div>

                    </div>

                    <!-- Garis Vertikal -->
                    <div class="border-start mx-4" style="height: auto; border-left: 2px solid #7a7979;"></div>

                    <!-- Detail User -->
                    {{-- <div class="w-100">
                        <table class="table table-borderless">
                            <tr>
                                <th class="text-muted">Nama</th>
                                <td class="text-muted">{{ $isi->name }}</td>
                                <th class="text-muted">NIK</th>
                                <td class="text-muted">{{ $isi->nik }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Tanggal Lahir</th>
                                <td class="text-muted">{{ $isi->birt_date }}</td>
                                <th class="text-muted">Jenis Kelamin</th>
                                <td class="text-muted">{{ $isi->jk }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Alamat</th>
                                <td colspan="3" class="text-muted">{{ $isi->address }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Email</th>
                                <td class="text-muted">{{ $isi->email }}</td>
                            </tr>
                            <tr>
                                <th class="text-muted">Foto KTP</th>
                                <td>
                                    <img src="{{ asset('storage/uploads/ktp/' . $isi->ktp) }}" alt="KTP" width="100">
                                </td>
                                <th class="text-muted">Foto SIM</th>
                                <td>
                                    <img src="{{ asset('storage/uploads/sim/' . $isi->sim) }}" alt="SIM" width="100">
                                </td>
                            </tr>
                        </table>
                    </div> --}}
                    <div class="row">
                        <div class="col">
                            <p class="text-muted m-0">Nama</p>
                            <p class="text-muted m-0">{{ $isi->name }}</p><br>
                            <p class="text-muted m-0">Email</p>
                            <p class="text-muted m-0">{{ $isi->email }}</p><br>
                            <p class="text-muted m-0">Alamat</p>
                            <p class="text-muted m-0">{{ $isi->address }}</p><br>
                            <p class="text-muted m-0">Foto KTP</p>
                            <p class="text-muted m-0"><img src="{{ asset('storage/uploads/ktp/' . $isi->ktp) }}" alt="KTP" width="200"></p>
                        </div>
                        <div class="col">
                            <p class="text-muted m-0">NIK</p>
                            <p class="text-muted m-0">{{ $isi->nik }}</p><br>
                            <p class="text-muted m-0">Tanggal lahir</p>
                            <p class="text-muted m-0">{{ $isi->birt_date }}</p><br>
                            <p class="text-muted m-0">Jenis Kelamin</p>
                            <p class="text-muted m-0">{{ $isi->jk }}</p>
                            <br><br>
                            <p class="text-muted m-0">Foto SIM</p>
                            <p class="text-muted m-0"><img src="{{ asset('storage/uploads/sim/' . $isi->sim) }}" alt="SIM" width="205"></p>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                <form action="{{ route('user.destroy', $isi->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Banned</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
