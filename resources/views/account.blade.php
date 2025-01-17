@extends('layouts.navuser')
@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Profile</title>
        <!-- Other head content -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

        {{-- <link rel="stylesheet" href="path/to/icofont.min.css"> --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/icofont.css') }}">
        {{-- <link rel="stylesheet" href="styles.css"> --}}
    </head>
    <style>
        .jam {
            position: relative;
            bottom: 40px;
            left: 40px;
            padding: 10px;
            background-color: #ffffff; /* Background color */
            border-radius: 50%; /* Make it circular */
            color: #01A8EF; /* Icon color */
            font-size: 15px; /* Icon size */
            cursor: pointer;
        }
        .icofont-pencil-alt-5::before {
            content: "\13ac4";
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .profile-header {
            position: relative;
            text-align: center;
            color: #2d465e;
        }

        .background-image {
            width: 100%;
            height: 350px;
            object-fit: cover;
        }

        .profile-info {
            position: absolute;
            bottom: -140px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
        }

        .profile-photo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid white;
        }

        .profile-details {
            margin: 80px 20px 20px;
        }

        .detail-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #ccc;
        }

        .profile-docs {
            display: flex;
            justify-content: space-around;
            margin: 20px;
        }

        .doc-item {
            text-align: center;
        }

        .doc-item img {
            width: 150px;
            height: 100px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

    </style>

    <body>

        <div class="card">
            <div class="profile-header"><br><br><br><br>
                <img src="assets.user/img/sampulbor.png" alt="Background" class="background-image">
                <div class="profile-info">
                    <img src="assets.user/img/avatar-3.webp" alt="User Photo" class="profile-photo">
                    <div class="icon-wrapper">
                        <i class="bi bi-pencil jam" data-bs-toggle="modal" data-bs-target="#editModal"></i>
                    </div>

                    <h2>User RentCar</h2>
                    <p>0821-0000-000</p>

                </div>
            </div>
            <br>
            <div class="row ms-2 p-4 justify-content-between">
                <div class="col-2">
                    <p class="text-muted m-0">
                        <i class="fas fa-envelope"></i> Email <br>
                    </p>
                    <p>email@gmail.com</p>
                </div>
                <div class="col-3">
                    <p class="text-muted m-0">
                        <i class="fas fa-user"></i> Nama lengkap <br>
                    </p>
                    <p>evvamaulani</p>
                </div>

                <div class="col-2 ms-auto">
                    <p class="text-muted m-0">
                        <i class="fas fa-id-card"></i> Nik <br>
                    </p>
                    <p>000000000000</p>
                </div>
                <div class="col-2">
                    <p class="text-muted m-0">
                        <i class="fas fa-venus-mars"></i> Jenis kelamin <br>
                    </p>
                    <p>Perempuan</p>
                </div>
            </div><br>
            <div class="row ms-2 p-4 justify-content-end">
                <div class="col-2">
                    <div class="doc-item text-center">
                        <p class="text-muted m-0">
                            Foto KTP <br>
                        </p>
                        <img src="assets.user/img/ktp.jpg" alt="Foto KTP" class="img-fluid"
                            style="border-radius: 10px;"><br>
                        <button style="border-radius: 10px; background-color: #6c757d; color: white;">Download</button>
                    </div>
                </div>
                <div class="col-2">
                    <div class="doc-item text-center">
                        <p class="text-muted m-0">
                            Foto SIM <br>
                        </p>
                        <img src="assets.user/img/sim.jpg" alt="Foto SIM" class="img-fluid"
                            style="border-radius: 10px;"><br>
                        <button style="border-radius: 10px; background-color: #6c757d; color: white;">Download</button>
                    </div>
                </div>
            </div>

        </div>
        <!-- Modal Edit Data -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                            <img src="{{ asset('assets.user/img/car.png') }}" alt="" width="50px"> <strong style="font-size: 1em">Ganti Password</strong>

                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="#" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="password_lama" class="form-label">Password lama</label>
                                <input type="password" class="form-control" id="password_lama" value="">
                            </div>
                            <div class="mb-3">
                                <label for="password_baru" class="form-label">Password baru</label>
                                <input type="password" class="form-control" id="password_baru" value="">
                            </div>
                            <div class="mb-3">
                                <label for="konfirmasi_password" class="form-label">Konfirmasi password</label>
                                <input type="password" class="form-control" id="konfirmasi_password" value="">
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
@endsection
