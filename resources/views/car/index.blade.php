@if (auth()->user()->hasRole('admin'))
    @extends('layouts.template')

    @section('content')
        <div class="mt-5">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}

                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <style>
                .kotak-biru {
                    border-radius: 10px;
                    background: linear-gradient(90deg, #15B9FF 33.4%, #0D6EFD 100%);
                    padding: 20px;
                    margin: 10px;
                    max-height: 85px;
                    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                }

                .card {
                    border-radius: 10px;
                    margin: 10px;
                    box-shadow: 0 4px 6px rgba(77, 76, 76, 0.1);
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                }

                .card:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 6px 10px rgba(55, 54, 54, 0.2);
                }

                .card-img-top {
                    border-radius: 10px 10px 0 0;
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
                }

                .mb-1 {
                    margin-bottom: 5px;
                }

                .mb-0 {
                    margin-bottom: 0;
                }

                .fw-bold {
                    font-weight: bold;
                }

                .alert-warning {
                    border-radius: 10px;
                    padding: 20px;
                    margin: 10px;
                    background-color: #fff3cd;
                    color: #856404;
                    border: 1px solid #ffeeba;
                }
            </style>
            <br>
            <!-- Card 1: Kotak Biru -->
            <div class="kotak-biru">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div>
                        <h2 class="text-white fw-bold mb-1">List Jenis Mobil</h2>
                        <p class="text-white fw-bold mb-0" style="font-size: 0.9rem;">Menu | List jenis mobil</p>
                    </div>
                </div>
            </div>



            <div class="card p-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <form method="GET" action="{{ route('car.index') }}" class="d-flex">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="filter" id="all" value="all"
                                {{ request('filter') === 'all' ? 'checked' : '' }}>
                            <label class="form-check-label" for="all">All</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="filter" id="tersedia" value="tersedia"
                                {{ request('filter') === 'tersedia' ? 'checked' : '' }}>
                            <label class="form-check-label" for="tersedia">Tersedia</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="filter" id="tidak_tersedia"
                                value="tidak_tersedia" {{ request('filter') === 'tidak_tersedia' ? 'checked' : '' }}>
                            <label class="form-check-label" for="tidak_tersedia">Tidak tersedia</label>
                        </div>
                        <input type="submit" hidden>
                    </form>
                    <a href="{{ route('car.create') }}" class="btn btn-primary">Tambah Mobil</a>
                </div>
            </div>

            <body>
                <div class="col-md-12 project-list">
                    <div class="card">
                        <div class="row align-items-center">


                            <!-- Kolom untuk search -->
                            <div class="col-md-2 p-0 text-end ms-5">
                                <form action="{{route('car.index')}}" method="GET" style="border: 1px solid #00000017; display:flex; flex-direction:row; padding:8px;border-radius: 8px;">
                                    <span id="search-icon">
                                        <i class="fa fa-search"
                                            style="padding-left: 4px;color:#00000040; padding-right: 6px;"></i>
                                    </span>
                                    <input type="text" style="border: none;" placeholder="Cari jenis mobil..."
                                        aria-label="Search" name="search">
                                </form>
                            </div>




                            <div class="col-sm-12 mt-3">
                                {{-- <div class="card"> --}}
                                <div class="card-block row">
                                    <div class="col-sm-12 col-lg-12 col-xl-12">
                                        <div class="table-responsive custom-scrollbar">
                                            <table class="table ">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Merek</th>
                                                        <th>Nama</th>
                                                        <th>plat nomer</th>
                                                        <th>tarif/harga</th>
                                                        <th>Status</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($cars as $car)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $car->merek->name }}</td>
                                                            <td>{{ $car->name }}</td>
                                                            <td>{{$car->plat}}</td>
                                                            <td>Rp.{{ number_format($car->price, 0, ',', '.')}}</td>
                                                            <td class="justify-center">
                                                                @if ($car->stock > 0)
                                                                    <button class="badge badge-primary">tersedia</button>
                                                                @else
                                                                    <button class="badge badge-danger">tidak tersedia</button>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('car.show', $car->id) }}"><img
                                                                        src="Frame 48.svg" alt="Show"></a>
                                                                <a href="{{ route('car.edit', $car->id) }}"><img
                                                                        src="Frame 47.svg" alt="Edit"></a>
                                                                <form id="delete-form-{{ $car->id }}"
                                                                    action="{{ route('car.destroy', $car->id) }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <a href="#"
                                                                        onclick="if(confirm('Apakah Anda yakin ingin menghapus data ini?')) { document.getElementById('delete-form-{{ $car->id }}').submit(); }">
                                                                        <img src="Frame 49.svg" alt="Delete">
                                                                    </a>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="5" class="text-center">
                                                                <img src="{{ asset('assets/images/logo/tidakada.png') }}"
                                                                    width="500px" alt="">
                                                            </td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                            <hr style="border-bottom: 1px solid #7a7979; margin: 10px 0;">
                                            </hr>
                                            {{-- @empty
                                            <tr>
                                                <div class="text-center">
                                                    <img src="{{ asset('assets/images/logo/tidakada.png') }}"
                                                        width="500px" alt="">
                                                </div>
                                            </tr>
    @endforelse --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </body>
        </div>
    @endsection
@else
    <div class="container mt-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <style>
            .kotak-biru {
                border-radius: 10px;
                background: linear-gradient(90deg, #15B9FF 33.4%, #0D6EFD 100%);
                padding: 20px;
                margin: 10px;
                max-height: 85px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            }

            .card {
                border-radius: 10px;
                margin: 10px;
                box-shadow: 0 4px 6px rgba(77, 76, 76, 0.1);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
            }

            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 6px 10px rgba(55, 54, 54, 0.2);
            }

            .card-img-top {
                border-radius: 10px 10px 0 0;
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
            }

            .mb-1 {
                margin-bottom: 5px;
            }

            .mb-0 {
                margin-bottom: 0;
            }

            .fw-bold {
                font-weight: bold;
            }

            .alert-warning {
                border-radius: 10px;
                padding: 20px;
                margin: 10px;
                background-color: #fff3cd;
                color: #856404;
                border: 1px solid #ffeeba;
            }
        </style>
        <span></span>

        <!-- Card 1: Kotak Biru -->
        <div class="kotak-biru">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <div>
                    <h2 class="text-white fw-bold mb-1">List Jenis Mobil</h2>
                    <p class="text-white fw-bold mb-0" style="font-size: 0.9rem;">Menu | List jenis mobil</p>
                </div>
            </div>
        </div>


        <div class="card p-3">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <form method="GET" action="{{ route('car.index') }}" class="d-flex">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="filter" id="all" value="all"
                            {{ request('filter') === 'all' ? 'checked' : '' }}>
                        <label class="form-check-label" for="all">All</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="filter" id="tersedia"
                            value="tersedia" {{ request('filter') === 'tersedia' ? 'checked' : '' }}>
                        <label class="form-check-label" for="tersedia">Tersedia</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="filter" id="tidak_tersedia"
                            value="tidak_tersedia" {{ request('filter') === 'tidak_tersedia' ? 'checked' : '' }}>
                        <label class="form-check-label" for="tidak_tersedia">Tidak tersedia</label>
                    </div>
                    <input type="submit" hidden>
                </form>
                <a href="{{ route('car.create') }}" class="btn btn-primary">Tambah Mobil</a>
            </div>
        </div>

        <body>
            <div class="col-md-12 project-list">
                <div class="card">
                    <div class="row align-items-center">
                        <!-- Kolom untuk search -->
                        <div class="col-md-2 p-0 text-end">
                            <form action=""
                                style="border: 1px solid #00000017; display:flex; flex-direction:row; padding:8px;border-radius: 8px;">
                                <span id="search-icon">
                                    <i class="fa fa-search"
                                        style="padding-left: 4px;color:#00000040; padding-right: 6px;"></i>
                                </span>
                                <input type="text" style="border: none;" placeholder="Cari aproval user..."
                                    aria-label="Search">
                            </form>
                        </div>
                        <div class="col-sm-12 mt-3">
                            {{-- <div class="card"> --}}
                            <div class="card-block row">
                                <div class="col-sm-12 col-lg-12 col-xl-12">
                                    <div class="table-responsive custom-scrollbar">
                                        <table class="table table-light">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Merek</th>
                                                    <th>Nama</th>
                                                    <th>Status</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($cars as $car)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $car->merek->name }}</td>
                                                        <td>{{ $car->name }}</td>
                                                        <td class="d-flex justify-center">
                                                            @if ($car->stock > 0)
                                                                <button class="badge badge-primary">tersedia</button>
                                                            @else
                                                                <button class="badge badge-danger">tidak tersedia</button>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('car.show', $car->id) }}"><img
                                                                    src="Frame 48.svg" alt="Show"></a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="14" class="text-center">Tidak ada data mobil
                                                            yang ditemukan.</td>
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
    </div>

@endif
