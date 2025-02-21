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
                        <h2 class="text-white fw-bold mb-1">Daftar Pengguna</h2>
                        <p class="text-white fw-bold mb-0" style="font-size: 0.9rem;">Pengguna | Daftar Pengguna</p>
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
                                    <form class="d-flex justify-content-between" method="GET"
                                        action="{{ route('user.index') }}">
                                        <!-- Dropdown filter -->
                                        <select name="gender" class="form-select me-2" aria-label="Filter Jenis Kelamin">
                                            <option value="" disabled
                                                {{ request('gender') == null ? 'selected' : '' }}>Filter Jenis Kelamin
                                            </option>
                                            <option value="laki-laki"
                                                {{ request('gender') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="perempuan"
                                                {{ request('gender') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>


                                        <!-- Kolom untuk search -->
                                        <div class="input-group me-2">
                                            <span class="input-group-text" id="search-icon">
                                                <i class="fa fa-search" style="color:#00000040;"></i>
                                            </span>
                                            <input type="text" name="search" class="form-control"
                                                placeholder="Cari berdasarkan email..." aria-label="Search"
                                                value="{{ request('search') }}">
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
                                    <table class="table ">
                                        <thead>

                                            <tr>
                                                <th scope="col">No</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Nik</th>
                                                <th scope="col">Umur</th>
                                                <th scope="col">Jenis Kelamin</th>
                                                <th scope="col">No Hp</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $isi)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $isi->email }}</td>
                                                    <td>{{ $isi->nik }}</td>
                                                    <td>{{ $isi->birt_date }}</td>
                                                    <td>{{ $isi->jk }}</td>
                                                    <td>{{ $isi->phone_number }}</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <button style="position: relative; right:40px" type="button"
                                                                class="btn btn-info btn-sm px-3 py-1" data-bs-toggle="modal"
                                                                data-bs-target="#show{{ $isi->id }}">
                                                                Detail
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
                                    <hr style="border-bottom: 1px solid #7a7979; margin: 10px 0;">
                                    </hr>
                                </div>
                            </div>
                            @if ($data->isEmpty())
                                <div class="text-center" style= "margin-top: 70px;">
                                    <img src="{{ asset('assets/images/logo/notdata.png') }}" width="200px" alt="">
                                </div>
                            @endif
                        </div>
                    </div>
                    @if ($data->count() > 0)
                        <div class="row mt-3">
                            <div class="col-md-12 text-center">
                                <nav>
                                    <ul class="pagination justify-content-end">
                                        {{ $data->links() }}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            </div>
        </body>
        <!-- Pagination -->

        @foreach ($data as $isi)
            <!-- Modal Detail User -->
            <div class="modal fade" id="show{{ $isi->id }}" tabindex="-1"
                aria-labelledby="showLabel{{ $isi->id }}" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content rounded-5">
                        <div class="modal-header">
                            <h5 class="modal-title" id="showLabel{{ $isi->id }}">
                                <img src="{{ asset('assets/images/logo/humma.jpg') }}" alt="" width="200px">
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row align-items-stretch">
                                <!-- Foto Profil -->
                                <div class="col-12 col-md-4 text-center mb-4 mb-md-0">
                                    <img src="{{ asset('storage/uploads/photo/' . $isi->photo) }}" alt="Foto Profil"
                                        class="rounded-circle border"
                                        style="width: 120px; height: 120px; object-fit: cover;">
                                    <h3 class="mt-1">{{ $isi->name }}</h3>
                                    <p class="text-muted">{{ $isi->phone_number }}</p>
                                    <hr class="my-3">
                                    <div class="alert alert-success light text-dark" role="alert"
                                        style="background-color: rgba(40, 167, 69, 0.2);">
                                        <p class="txt-dark"><strong>Tanggal Daftar :</strong>
                                            {{ \Carbon\Carbon::parse($isi->created_at)->format('d-m-y') }}</p>
                                    </div>
                                    <div class="alert alert-info light text-dark" role="alert"
                                        style="background-color: rgba(23, 162, 184, 0.2);">
                                        <p class="txt-dark"><strong>Terakhir Aktif:</strong>
                                            {{ \Carbon\Carbon::parse($isi->updated_at)->format('d-m-y') }}</p>
                                    </div>

                                </div>

                                <!-- Garis Vertikal -->
                                <div class="col-12 col-md-1 d-none d-md-block">
                                    <div class="border-start mx-auto"
                                        style="height: 100%; border-left: 2px solid #7a7979;"></div>
                                </div>

                                <!-- Detail User -->
                                <div class="col-12 col-md-7">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 mb-3">
                                            <p class="text-muted m-0">Nama</p>
                                            <p class="text-muted m-0">{{ $isi->name }}</p><br>
                                            <p class="text-muted m-0">Email</p>
                                            <p class="text-muted m-0">{{ $isi->email }}</p><br>
                                            <p class="text-muted m-0">Alamat</p>
                                            <p class="text-muted m-0">{{ $isi->address }}</p><br><br>
                                            <p class="text-muted m-0">Foto KTP</p>
                                            <img src="{{ asset('storage/uploads/ktp/' . $isi->ktp) }}" alt="KTP"
                                                class="rounded border"
                                                style="width: 100%; height: 120px; object-fit: cover;">
                                        </div>
                                        <div class="col-12 col-sm-6">
                                            <p class="text-muted m-0">NIK</p>
                                            <p class="text-muted m-0">{{ $isi->nik }}</p><br>
                                            <p class="text-muted m-0">Tanggal Lahir</p>
                                            <p class="text-muted m-0">{{ $isi->birt_date }}</p><br>
                                            <p class="text-muted m-0">Jenis Kelamin</p>
                                            <p class="text-muted m-0">{{ $isi->jk }}</p><br><br>
                                            <p class="text-muted m-0">Foto SIM</p>
                                            <img src="{{ asset('storage/uploads/sim/' . $isi->sim) }}" alt="SIM"
                                                class="rounded border"
                                                style="width: 100%; height: 120px; object-fit: cover;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('user.destroy', $isi->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Dilarang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endsection
