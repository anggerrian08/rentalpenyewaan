<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>@yield('title', 'HUMMA RENTCAR')</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('assets.user/img/car.png') }}" rel="icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets.user/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('assets.user/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets.user/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets.user/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets.user/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets.user/css/main.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css') }}">

    {{-- Additional CSS --}}
    {{-- @stack('css') --}}
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div
            class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets.user/img/logo.png" alt=""> -->
                <img src="assets.user/img/humma.png" alt="" width="180px">
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="/" class="<?php echo $_SERVER['REQUEST_URI'] == '/' ? 'active' : ''; ?>">Beranda</a></li>
                    <li><a href="/pemesanan" class="<?php echo $_SERVER['REQUEST_URI'] == '/pemesanan' ? 'active' : ''; ?>">Pemesanan</a></li>
                    <li><a href="/favorit" class="<?php echo $_SERVER['REQUEST_URI'] == '/favorit' ? 'active' : ''; ?>">Favorit</a></li>
                </ul>
            </nav>


            {{-- <a class="btn-getstarted" href="{{ route('login') }}">Log in</a> --}}

            <style>
                .navmenu ul li a.active {
                    --theme-default: #01A8EF;
                    /* Tambahkan gaya lainnya jika diperlukan */
                }

                .nav-menus {
                    --theme-default: #01A8EF;
                    align-items: center;
                    display: flex;
                    justify-content: flex-end;
                    list-style-type: none;
                    margin-bottom: 0;
                    padding-left: 0;

                    .profile-nav {
                        border: none !important;
                        margin-right: 0;
                        cursor: pointer;
                        display: inline-block;
                        padding: 9px 14px;
                        padding-top: 9px;
                        padding-right: 14px;
                        padding-bottom: 9px;
                        position: relative;
                        margin-left: auto;
                    }

                    .profile-media {
                        align-items: center !important;
                        display: flex !important;

                    }

                    .profile-dropdown {
                        padding: 0 10px;
                        top: 57px;
                        width: 160px;
                        right: 0;
                        left: unset !important;
                        box-shadow: 0 0 20px rgba(89, 102, 122, .1);
                        opacity: 0;
                        transform: translateY(30px);
                        visibility: hidden;
                        background-color: #fff;
                        position: absolute;
                        transition: all .3s linear;
                        z-index: 8;
                        margin-bottom: 0;
                        list-style-type: none;
                    }

                    .b-r-25 {
                        border-radius: 25px !important;
                    }

                    .profile-media .flex-grow-1 {
                        margin-left: 10px;
                    }

                    .d-flex .flex-grow-1 {
                        flex: unset;
                        flex-grow: 1 !important;
                        flex-grow: unset;
                    }

                    .profile-media .flex-grow-1 span {
                        display: -webkit-box !important;
                        font-weight: 700;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        -webkit-line-clamp: 1;
                        -webkit-box-orient: vertical;
                        color: #1f2f3e;
                        white-space: normal;
                    }

                    li i {
                        font-size: 14px !important
                    }

                    li svg {
                        width: 18px !important;
                        height: 22px;
                        vertical-align: middle;
                        width: 22px;
                        stroke: #1f2f3e;
                        fill: none;
                    }

                    li svg path {
                        color: #1f2f3e
                    }

                    .onhover-show-div {
                        left: unset;
                        right: 0;
                        top: 50px;
                        width: 330px
                    }

                    .onhover-show-div .dropdown-title {
                        border-bottom: 1px solid hsla(256, 5%, 58%, .3);
                        font-weight: 700;
                        padding: 20px;
                        text-align: center
                    }

                    .onhover-show-div ul {
                        padding: 15px
                    }

                    .onhover-show-div ul li .d-flex {
                        position: relative
                    }

                    .onhover-show-div ul li .d-flex .message-img {
                        border-radius: 50%;
                        padding: 5px
                    }

                    .onhover-show-div ul li .d-flex .message-img img {
                        border-radius: 50%;
                        height: auto;
                        position: relative;
                        width: 40px
                    }

                    .onhover-show-div ul li .d-flex .flex-grow-1 {
                        margin-left: 15px
                    }

                    .onhover-show-div ul li .d-flex .flex-grow-1 h5 a {
                        color: #1f2f3e;
                        font-weight: 600
                    }

                    .onhover-show-div ul li .d-flex .flex-grow-1 p {
                        display: -webkit-box !important;
                        line-height: 1.4;
                        margin-bottom: 0;
                        opacity: .6;
                        overflow: hidden;
                        text-overflow: ellipsis;
                        -webkit-line-clamp: 1;
                        -webkit-box-orient: vertical;
                        white-space: normal
                    }

                    .onhover-show-div ul li .d-flex .notification-right svg {
                        margin-top: 11px;
                        vertical-align: middle;
                        width: 18px;
                        stroke: #848789
                    }

                    .onhover-show-div li {
                        padding: 15px
                    }

                    .onhover-show-div li+li {
                        border-top: 1px solid hsla(256, 5%, 58%, .3)
                    }

                    .onhover-show-div li p {
                        font-size: 14px;
                        letter-spacing: .3px;
                        margin-bottom: 0
                    }

                    .onhover-show-div li a {
                        letter-spacing: .3px
                    }

                    .onhover-show-div li:last-child {
                        padding-bottom: 0
                    }

                    .onhover-show-div li .d-flex {
                        position: relative
                    }

                    .onhover-show-div li .d-flex img {
                        position: relative;
                        width: 40px
                    }

                    .onhover-show-div li .d-flex .status-circle {
                        left: 0
                    }

                    .onhover-show-div li .d-flex .flex-grow-1>span {
                        display: inline-block;
                        font-weight: 600;
                        letter-spacing: .8px;
                        padding-right: 10px
                    }

                    .onhover-show-div li .d-flex .flex-grow-1 p {
                        margin-bottom: 8px
                    }

                    .onhover-show-div::before {
                        left: unset !important;
                        right: 10px !important;
                    }

                    .onhover-dropdown:hover .onhover-show-div::after {
                        border-bottom: 7px solid #d7e2e9;
                        z-index: 1;
                    }

                    .onhover-dropdown:hover .onhover-show-div::after,
                    .onhover-dropdown:hover .onhover-show-div::before {
                        border-left: 7px solid transparent;
                        border-right: 7px solid transparent;
                        content: "";
                        height: 0;
                        left: 10px;
                        position: absolute;
                        top: -7px;
                        width: 0;
                    }

                    .onhover-dropdown:hover .onhover-show-div::before {
                        border-bottom: 7px solid #fff;
                        z-index: 2;
                    }

                    .onhover-show-div {
                        left: unset;
                        right: 0;
                        top: 50px;
                        width: 330px;
                        background-color: #fff;
                        position: absolute;
                        transition: all .3s linear;
                        z-index: 8;
                    }

                    .profile-dropdown {
                        left: -12px;
                        padding: 0 10px;
                        top: 57px;
                        width: 160px;
                    }

                    .onhover-dropdown:hover .onhover-show-div {
                        border-radius: 5px;
                        opacity: 1;
                        transform: translateY(0);
                        visibility: visible;
                    }

                    .onhover-show-div li::before {
                        display: none;
                    }

                    .profile-dropdown li {
                        padding: 10px !important;
                    }

                    .profile-dropdown li a {
                        text-decoration: unset;
                    }

                    .onhover-show-div li a {
                        letter-spacing: .3px;
                    }

                    .profile-dropdown li:hover a svg,
                    .page-wrapper .page-header .header-wrapper .nav-right .profile-dropdown li:hover a svg path {
                        stroke: var(--theme-default);
                        transition: stroke .3s ease;
                    }

                    .profile-dropdown li svg {
                        margin-right: 10px;
                        vertical-align: bottom;
                        width: 16px;
                        stroke: #121313;
                        fill: none;
                        height: 22px;
                    }

                    .onhover-show-div li a svg {
                        margin-top: 0 !important;
                    }

                    .onhover-show-div li a {
                        color: unset;
                        letter-spacing: .3px;
                    }

                    .profile-dropdown li:hover a span {
                        color: var(--theme-default);
                        transition: color .3s ease;
                    }

                    .onhover-show-div li+li {
                        border-top: 1px solid hsla(256, 5%, 58%, .3);
                    }

                    .profile-dropdown li {
                        padding: 10px !important;
                    }

                    a:hover {
                        transition: all .5s ease-in;
                    }

                    a,
                    a:hover {
                        color: var(--theme-default);
                    }

                    a:hover {
                        --bs-link-color-rgb: var(--bs-link-hover-color-rgb);
                    }

                    a:active,
                    a:hover {
                        outline-width: 0;
                    }
                }
            </style>
            {{-- <div class="nav-right col-xl-18 col-lg-12 col-auto pull-right right-header p-0"> --}}
            <ul class="nav-menus">
                <li class="serchinput d-none">
                    <div class="serchbox">
                        <svg>
                            <use href="../assets/svg/icon-sprite.svg#search"></use>
                        </svg>
                    </div>
                    <div class="form-group search-form">
                        <input type="text" placeholder="Search here...">
                    </div>
                </li>
                <li class="profile-nav onhover-dropdown pe-0 py-0">
                    <div class="d-flex align-items-center profile-media">
                        <img class="b-r-25" src="{{ asset('assets/images/dashboard/profile.png') }}"
                            alt="Profile Picture">
                        <div class="flex-grow-1 user">
                            @auth
                                <span>{{ auth()->user()->name }}</span>
                                <p class="mb-0 font-nunito">
                                    {{ auth()->user()->role->name ?? 'User' }}
                                    <svg>
                                        <use href="../assets/svg/icon-sprite.svg#header-arrow-down"></use>
                                    </svg>
                                </p>
                            @else
                                <span>Tamu</span>
                                <p class="mb-0 font-nunito">
                                    Silahkan Masuk
                                    <svg>
                                        <use href="../assets/svg/icon-sprite.svg#header-arrow-down"></use>
                                    </svg>
                                </p>
                            @endauth
                        </div>
                    </div>
                    <ul class="profile-dropdown onhover-show-div">
                        @auth
                            <li><a href="{{ route('account.index') }}"><i data-feather="user"></i><span>Akun</span></a>
                            </li>
                            <li><a href="{{ route('riwayat.index') }}"><i data-feather="book"></i><span>Riwayat</span></a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        style="background: none; border: none; color: inherit; display: flex; align-items: center; padding: 0;">
                                        <i data-feather="log-out"></i><span>Keluar</span>
                                    </button>
                                </form>
                            </li>
                        @else
                            {{-- <li><a href="user-profile.html"><i data-feather="user"></i><span>Account </span></a>
                            </li>
                            <li><a href="letter-box.html"><i data-feather="mail"></i><span>Transaksi</span></a></li> --}}
                            <li>
                                <a href="{{ route('login') }}"
                                    style="text-decoration: none; color: inherit; display: flex; align-items: center;">
                                    <i data-feather="log-in"></i><span>Masuk</span>
                                </a>
                            </li>
                        @endauth
                    </ul>
                </li>

            </ul>
            {{-- </div> --}}


        </div>
    </header>

    <main class="main">
        @include('sweetalert::alert')
        @yield('content')

    </main>

    <footer id="footer" class="footer">

        <div class="container footer-top">
            <div class="row gy-4">
                <div class="col-lg-5 col-md-4 footer-about">
                    <a href="index.html" class="logo d-flex align-items-center">
                        <img src="assets.user/img/humma.png" alt="" width="200px">
                    </a>
                    Humma RentCar adalah sebuah platform berbasis web yang dirancang untuk memberikan kemudahan
                    dalam proses penyewaan mobil. Website ini menawarkan solusi praktis bagi pengguna untuk
                    mencari, memesan, dan mengelola penyewaan mobil secara online.
                    {{-- <div class="social-links d-flex mt-4">
                        <a href=""><i class="bi bi-twitter-x"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                        <a href=""><i class="bi bi-linkedin"></i></a>
                    </div> --}}
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Media Sosial</h4>
                    <ul>
                        <li><a href="#"><i class="bi bi-facebook"></i> Facebook</a></li>
                        <li><a href="#"><i class="bi bi-instagram"></i> Instagram</a></li>
                        <li><a href="#"><i class="bi bi-tiktok"></i> Tik Tok</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-3 footer-links">
                    <h4>Layanan Kami</h4>
                    <ul>
                        <li><a href="#">Sewa mobil harian</a></li>
                        <li><a href="#">Sewa mobil dan sopir</a></li>
                        <li><a href="#">Sewa mobil tanpa supir</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4>Hubungi Kami</h4>
                    <ul>
                        <li><a href="#"><i class="bi bi-telephone"></i> +1 5589 55488 55</a></li>
                        <li><a href="#"><i class="bi bi-envelope"></i> humma@gmail.com</a></li>
                        <li><a href="#"><i class="bi bi-geo-alt"></i> Malang, Jawa Timur</a></li>
                    </ul>
                </div>

            </div>
        </div>

        {{-- <div class="container copyright text-center mt-4">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">iLanding</strong> <span>All Rights
                    Reserved</span></p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> Distributed By <a
                    href="https://themewagon.com">ThemeWagon</a>
            </div>
        </div> --}}

    </footer>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha384-oLxXk4BPLj3wR+QZXxIMT96ePAE+1vCA0J6KqjEsvN5j1A5j43rWsm1BTxf6fiAz" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="assets.user/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets.user/vendor/php-email-form/validate.js"></script>
    <script src="assets.user/vendor/aos/aos.js"></script>
    <script src="assets.user/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets.user/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets.user/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- Main JS File -->
    <script src="assets.user/js/main.js"></script>

    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>

    <script>
        @if (session('success'))
            Swal.fire({
                title: "Success",
                text: "{{ session('success') }}",
                icon: "success",
                showConfirmButton: false,
                timer: 3000
            });
        @endif
        @if (session('error'))
            Swal.fire({
                title: "Error",
                text: "{{ session('error') }}",
                icon: "error",
                showConfirmButton: false,
                timer: 3000
            });
        @endif
    </script>
</body>

</html>
