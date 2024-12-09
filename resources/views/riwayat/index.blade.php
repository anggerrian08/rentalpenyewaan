@extends('layouts.template')
@section('content')
    <span>
    </span>
    <div class="col-md-12 project-list">
        <div class="card">
            <div class="row align-items-center">
                <!-- Kolom kiri -->
                <div class="col-md-6 p-0">
                    <h2>Riwayat Transaksi</h2>
                    <h6>Transaksi | Riwayat Transaksi</h6>
                </div>
            </div>
        </div>
    </div>

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
                    </div>
                    <!-- Kolom untuk search -->
                    <div class="col-md-3 p-0 text-end">
                        <div class="input-group">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Cari merk mobil..."
                                aria-label="Search">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <!-- Kolom untuk tombol Terima -->
                    <div class="col-md-2 p-0 text-end " style="margin-left:410px">
                        <button type="button" class="btn btn-success">
                            Terima
                        </button>
                    </div>
                        </form>
                </div>
            </div>
        </div>

                <div class="col-sm-12">
                    <div class="card">
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
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Graphic Design </td>
                                                <td>Strap@google.com </td>
                                                <td>+91 8347855785 </td>
                                                <td>Elana John </td>
                                                <td>23/08/2024 </td>
                                                <td>$4125.00 </td>
                                                <td class="font-danger">Pending </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pagination -->
                <div class="row mt-3">
                    <div class="col-md-12 text-center">
                        <nav>
                            <ul class="pagination justify-content-center">
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
