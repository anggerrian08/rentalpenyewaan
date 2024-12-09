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
                <h2 class="text-white fw-bold mb-1">Aproval User</h2>
                <p class="text-white fw-bold mb-0" style="font-size: 0.9rem;">Menu | Aproval User</p>
            </div>
        </div>
    </div>

</head>

<body>
    <div class="col-md-12 project-list">
        <div class="card">
            <div class="row align-items-center">
                <!-- Kolom untuk filter -->
                <div class="col-md-2 p-0 text-end">
                    <form class="d-flex justify-content-end">
                        <!-- Dropdown filter -->
                        <select class="form-select me-2" aria-label="Filter Merk Mobil">
                            <option value="" selected>Filter</option>
                            <option value="a-z">A-Z</option>
                            <option value="z-a">Z-A</option>
                            <option value="terbaru">Terbaru</option>
                            <option value="terlama">Terlama</option>
                        </select>
                    </form>
                </div>

                <!-- Kolom untuk search -->
                <div class="col-md-2 p-0 text-end">
                    <form action="" style="border: 1px solid #00000017; display:flex; flex-direction:row; padding:8px;border-radius: 8px;">
                        <span id="search-icon">
                            <i class="fa fa-search" style="padding-left: 4px;color:#00000040; padding-right: 6px;"></i>
                        </span>
                        <input type="text" style="border: none;" placeholder="Cari aproval user..." aria-label="Search">
                    </form>
                </div>

                <!-- Kolom untuk tombol Terima -->
                <div class="col-md-2 p-0 text-end" style="margin-left:570px;">
                    <button type="button" class="btn btn-success">Terima</button>
                </div>
            </div>

            <div class="col-sm-12 mt-3">
                <div class="card-block row">
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                        <div class="table-responsive custom-scrollbar">
                            <table class="table table-light">
                                <thead>
                                    <tr>
                                        <th scope="col">Pilih</th>
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
                                    @foreach ($user as $isi)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="user_ids[]" value="{{ $isi->id }}">
                                        </td>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $isi->name }}</td>
                                        <td>{{ $isi->nik }}</td>
                                        <td>{{ $isi->birt_date }}</td>
                                        <td>{{ $isi->jk }}</td>
                                        <td>{{ $isi->phone_number }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center flex item-center">
                                                <button style="position: relative; right:20px" type="button" class="btn btn-info btn-sm p-1" data-bs-toggle="modal" data-bs-target="#show{{ $isi->id }}">
                                                    <i class="fa fa-eye" style="font-size: 15px;"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <hr style="border-bottom: 1px solid #7a7979; margin: 10px 0;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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

</body>
@endsection
