@extends('layouts.template')
@section('content')
    <span>
    </span>
<style>

</style>
    <head>
        <div class="col-md-12 project-list">
            <div class="card" style="background: linear-gradient(90deg, #15B9FF 33.4%, #0D6EFD 100%);
 color: white;">
                <div class="row align-items-center">
                    <!-- Kolom kiri -->
                    <div class="col-md-6 p-0">
                        <h2 style="color: white;">  Daftar User</h2>
                        <h6 style="color: white;">  User | Daftar User</h6>
                    </div>
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
                        <div class="input-group">
                            <span class="input-group-text" id="search-icon">
                                <i class="fa fa-search"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="Cari User..." aria-label="Search">
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
                                            <th scope="col">NIK</th>
                                            <th scope="col">Umur</th>
                                            <th scope="col">Jenis Kelamin</th>
                                            <th scope="col">No Hp</th>
                                            <th scope="col" class="text-center">Aksi</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <!-- Repeatable Row -->
                                        {{-- @foreach($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->nama }}</td>
                                            <td>{{ $user->nik }}</td>
                                            <td>{{ $user->umur }}</td>
                                            <td>{{ $user->jenis_kelamin }}</td>
                                            <td>{{ $user->no_hp }}</td>
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-primary">👁️</button>
                                            </td>
                                        </tr>
                                        @endforeach --}}
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

    </body>
@endsection
