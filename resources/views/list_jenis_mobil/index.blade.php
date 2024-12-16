@extends('layouts.template')
@section('content')
    <style>
        .kotak-biru {
            border-radius: 10px;
            background: linear-gradient(90deg, #15B9FF 33.4%, #0D6EFD 100%);
            padding: 20px;
            /* Ukuran padding lebih kecil */
            margin: 10px;
            /* Margin kecil */
            max-height: 85px;
            /* Lebar maksimum kotak */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Bayangan lebih halus */
        }

        .card {
            border-radius: 10px;
            margin: 10px;
            /* Menambahkan jarak antar kotak */
            box-shadow: 0 4px 6px rgba(77, 76, 76, 0.1);
            /* Efek bayangan */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            /* Animasi saat hover */
        }

        .card:hover {
            transform: translateY(-5px);
            /* Kotak naik sedikit saat hover */
            box-shadow: 0 6px 10px rgba(55, 54, 54, 0.2);
            /* Bayangan lebih tegas */
        }

        .card-img-top {
            border-radius: 10px 10px 0 0;
            /* Membulatkan sudut gambar atas */
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
            /* Warna putih untuk teks */
        }

        .mb-1 {
            margin-bottom: 5px;
            /* Margin lebih kecil untuk heading */
        }

        .mb-0 {
            margin-bottom: 0;
            /* Hilangkan margin bawah */
        }

        .fw-bold {
            font-weight: bold;
            /* Membuat teks menjadi bold */
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
                    <h2 class="text-white fw-bold mb-1">Jenis Mobil</h2>
                    <p class="text-white fw-bold mb-0" style="font-size: 0.9rem;">Menu | List Jenis Mobil</p>
                </div>
            </div>
        </div>
    </head>

    <body>
        <div class="card">
            <div class="card-header">
                <div class="row align-items-left">
                    <!-- Kolom untuk filter -->
                    <div class="col-md-2 p-0 text-end">
                        <form class="d-flex justify-content-center">
                            <!-- Dropdown filter -->
                            <select class="form-select"
                                style="border: 1px solid #00000017; display:flex; flex-direction:row; padding:8px; border-radius: 8px; width: 135px;"
                                aria-label="Filter Merk Mobil">
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
                        <form action=""
                            style="border: 1px solid #00000017; display:flex; flex-direction:row; padding:8px;border-radius: 8px;">
                            <span id="search-icon">
                                <i class="fa fa-search" style="padding-left: 4px;color:#00000040; padding-right: 6px;"></i>
                            </span>
                            <input type="text" style="border: none;" placeholder="Cari merk mobil..."
                                aria-label="Search">
                        </form>
                    </div>

                    <!-- Kolom untuk tombol Terima -->
                    <div class="col-md-2 p-0 text-end" style="margin-left:570px;padding:8px;">
                        <button type="button" class="btn btn-success">Terima</button>
                    </div>
                </div>
            </div>
            <div class="table-responsive custom-scrollbar signal-table">
                <table class="table table-hover">
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
                        <tr>
                            <th scope="row">5</th>
                            <td>Vani</td>
                            <td>Shah </td>
                            <td>Los Angeles </td>
                            <td>Senior Developer </td>
                            <td>$3500.00 </td>
                            <td>23/07/2024 </td>
                            <td>28 </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="row mt-3">
                <div class="col-md-12 text-center">
                    <nav>
                        <ul class="pagination justify-content-end" style="border: none;">
                            <li class="page-item" style="border: none;">
                                <a class="page-link" href="#" aria-label="Previous" style="border: none;">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <li class="page-item" style="border: none;"><a class="page-link" href="#"
                                    style="border: none;">1</a></li>
                            <li class="page-item" style="border: none;"><a class="page-link" href="#"
                                    style="border: none;">2</a></li>
                            <li class="page-item" style="border: none;"><a class="page-link" href="#"
                                    style="border: none;">3</a></li>
                            <li class="page-item" style="border: none;">
                                <a class="page-link" href="#" aria-label="Next" style="border: none;">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        </div>
    </body>
@endsection
