@extends('layouts.template')
@section('content')
    <style>
        .chart-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            /* Jarak antara kedua chart */
        }

        .chart-card {
            flex: 1;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            height: 300px;
        }

        .card-container {
            display: flex;
            /* Mengatur elemen child sejajar horizontal */
            justify-content: space-between;
            /* Memberi jarak antar-card
                    flex-wrap: wrap;
                    /* Membuat card turun ke baris berikutnya jika layar sempit */
            /*gap: 40px; /* Jarak antar-card (opsional) */
            margin-bottom: 10px;
            /* Menambahkan jarak antara card dan chart */
        }

        .card-atas {
            shadow: #000000;
            background: rgba(255, 255, 255, 0);
            /* Transparan sepenuhnya */
            box-shadow: none;
            /* Menghilangkan bayangan */
            border: none;
            /* Menghilangkan border */
            padding: 0px;
            /* Tetap beri padding agar isi tidak mepet */
            color: #000;
            /* Pastikan teks tetap terlihat */
            /* width: 0px; */
            /* margin: 6px;
                    margin-bottom: 15px; */
            text-align: center;
            /* Pusatkan konten dalam card */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            /* Tambahkan bayangan untuk efek */
            border-radius: 20px;
            /* Sudut melengkung */
            /* margin-left: 40px; /* Jarak antar-card (opsional) */
            /* margin-right: 40px; */
            flex: 0 0 auto;
            width: 30%;


        }

        .card-atas>img {
            width: 100%;
            height: auto;
        }


        .box-right {
            margin: 4px;
        }

        .box-left {
            position: relative;
        }

        * {
            margin: 0;
            /* border: 1px solid #e7eaec; */
            padding: 0;
            border-radius: 15px;
            font-family: 'Poppins', sans-serif
        }

        p {
            margin: 0
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            background-color: #e8eaf6;
            padding: 35px;
        }

        .box-right {
            padding: 30px 25px;
            background-color: white;
            border-radius: 15px
        }

        .box-left {
            padding: 20px 20px;
            background-color: white;
            border-radius: 15px
        }

        .textmuted {
            color: #7a7a7a
        }

        .bg-green {
            background-color: #d4f8f2;
            color: #06e67a;
            padding: 3px 0;
            display: inline;
            border-radius: 25px;
            font-size: 11px
        }

        .p-blue {
            font-size: 14px;
            color: #1976d2
        }

        .fas.fa-circle {
            font-size: 12px
        }

        .p-org {
            font-size: 14px;
            color: #fbc02d
        }

        .h7 {
            font-size: 15px
        }

        .h8 {
            font-size: 12px
        }

        .h9 {
            font-size: 10px
        }

        .bg-blue {
            background-color: #dfe9fc9c;
            border-radius: 5px
        }

        .form-control {
            box-shadow: none !important
        }

        .card input::placeholder {
            font-size: 14px
        }

        ::placeholder {
            font-size: 14px
        }

        input.card {
            position: relative
        }

        .far.fa-credit-card {
            position: absolute;
            top: 10px;
            padding: 0 15px
        }

        .fas,
        .far {
            cursor: pointer
        }

        .cursor {
            cursor: pointer
        }

        .btn.btn-primary {
            box-shadow: none;
            height: 40px;
            padding: 11px
        }

        .bg.btn.btn-primary {
            background-color: transparent;
            border: none;
            color: #1976d2
        }

        .bg.btn.btn-primary:hover {
            color: #539ee9
        }

        @media(max-width:320px) {
            .h8 {
                font-size: 11px
            }

            .h7 {
                font-size: 13px
            }

            ::placeholder {
                font-size: 10px
            }
        }

        @media (max-width: 768px) {
            .card-atas {
                width: 100%;
                /* Card akan mengambil seluruh lebar layar */
            }
        }


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
    </style>

    <head>
        <span></span>
        <div class="kotak-biru">
            <div class="d-flex justify-content-between align-items-start mb-3">
                <!-- Heading "Merk Mobil" -->
                <div>
                    <h2 class="text-white fw-bold mb-1">Dashboard</h2>
                    <p class="text-white fw-bold mb-0" style="font-size: 0.9rem;">Menu | Dashboard</p>
                </div>
            </div>
        </div>
    </head>

    <body>

        {{-- <div class="container"> --}}
        <div class="row m-2 mt-3">
            <div class="">
                <div class="row">
                    {{-- <div class="col-md-4"> --}}

                    <div class="card-container row">
                        <div class="card-atas">
                            {{-- <h2> --}}
                            <img src="{{ asset('assets/images/logo/1.svg') }}" alt="">
                            {{-- </h2> --}}
                        </div>
                        <div class="card-atas">
                            {{-- <h2> --}}
                            <img src="{{ asset('assets/images/logo/2.svg') }}" alt="">
                            {{-- </h2> --}}
                        </div>
                        <div class="card-atas">
                            {{-- <h2> --}}
                            <img src="{{ asset('assets/images/logo/3.svg') }}" alt="">
                            {{-- </h2> --}}
                        </div>
                    </div>

                    <div class="row m-2 mt-3">
                        {{-- Laravel Chart --}}
                        <div class="col-md-6 px-0 mb-2">
                            <div style="width: 500px; height: 20px; margin: 0 auto;">
                                {!! $chart->container() !!}
                            </div>
                        </div>

                        <div class="col-md-6 px-0 mb-2">
                            <div style="width: 400px; height: 200px; margin: 0 auto;">
                                {!! $chartDonut->container() !!}
                            </div>
                        </div>
                    </div>
                    {{-- End Charts --}}
                </div>
    </body>

    <script src="{{ $chart->cdn() }}"></script>

    {{ $chart->script() }}

    <script src="{{ $chartDonut->cdn() }}"></script>

    {{ $chartDonut->script() }}
@endsection
