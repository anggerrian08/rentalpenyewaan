@if (auth()->user()->hasRole('admin'))
    ;
@endif
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from admin.pixelstrap.net/zono/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2024 14:47:34 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Zono admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Zono admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">

    {{-- <link rel="shortcut icon" href="{{ asset('assets/images/logo/humma.jpg') }}" type="image/x-icon"> --}}
    <title>HUMMA RENTCAR</title>

    <style>
        .logo-wrapper {
            border-bottom: 1px solid #ddd;
            /* Garis tipis */
            padding-bottom: 10px;
            /* Beri jarak bawah */
            margin-bottom: 10px;
            /* Jarak untuk elemen di bawahnya */
        }

        .sidebar-list a[href="{{ route('dashboard') }}"] {
            border-bottom: 1px solid #ddd;
            /* Garis tipis */
            padding-bottom: 10px;
            /* Beri jarak bawah */
            display: block;
            /* Pastikan elemen penuh */
        }

        .nav-right {
            display: flex;
            justify-content: flex-end;
            /* Menggeser ke kanan */
            align-items: center;
            /* Menjaga elemen tetap berada di tengah secara vertikal */
        }

        .profile-nav {
            margin-left: auto;
            /* Ini memastikan elemen berada di ujung kanan */
        }
    </style>

    <!-- Google font -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/font-awesome.css') }}">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/icofont.css') }}">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/themify.css') }}">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/flag-icon.css') }}">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/feather-icon.css') }}">
    <!-- Plugins css start-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/scrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/owlcarousel.css') }}">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors/bootstrap.css') }}">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
    <link id="color" rel="stylesheet" href="{{ asset('assets/css/color-1.css') }}" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
</head>

<body>
    <!-- loader starts-->
    <div class="loader-wrapper">
        <div class="theme-loader">
            <div class="loader-p"></div>
        </div>
    </div>
    <!-- loader ends-->
    <!-- tap on top starts-->
    {{-- <div class="tap-top"><i data-feather="chevrons-up"></i></div> --}}
    <!-- tap on tap ends-->
    <!-- page-wrapper Start   -->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-header">
            <div class="header-wrapper row m-0">
                <div class="header-logo-wrapper col-auto p-0">
                    <div class="logo-wrapper"><a href="index.html"> <img class="img-fluid for-light"
                                src="../assets/images/logo/logo.png" alt=""><img class="img-fluid for-dark"
                                src="../assets/images/logo/logo_dark.png" alt=""></a></div>
                    <div class="toggle-sidebar">
                        <svg class="sidebar-toggle">
                            <use href="{{ asset('assets/svg/icon-sprite.svg#stroke-animation') }}"></use>
                        </svg>
                    </div>
                </div>
                {{-- <form class="col-sm-4 form-inline search-full d-none d-xl-block" action="#" method="get">
            <div class="form-group">
              <div class="Typeahead Typeahead--twitterUsers">
                <div class="u-posRelative">
                  <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Type to Search .." name="q" title="" autofocus>
                  <svg class="search-bg svg-color">
                    <use href="../assets/svg/icon-sprite.svg#search"></use>
                  </svg>
                </div>
              </div>
            </div>
          </form> --}}
                <div class="nav-right col-xl-18 col-lg-12 col-auto pull-right right-header p-0">
                    <ul class="nav-menus">
                        <li class="serchinput">
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
                                    alt="">
                                <div class="flex-grow-1 user">
                                    <span>Helen Walter</span>
                                    <p class="mb-0 font-nunito">Admin
                                        <svg>
                                            <use href="../assets/svg/icon-sprite.svg#header-arrow-down"></use>
                                        </svg>
                                    </p>
                                </div>
                            </div>
                            <ul class="profile-dropdown onhover-show-div">
                                <li><a href="user-profile.html"><i data-feather="user"></i><span>Account </span></a>
                                </li>
                                <li><a href="letter-box.html"><i data-feather="mail"></i><span>Inbox</span></a></li>
                                <li><a href="task.html"><i data-feather="file-text"></i><span>Taskboard</span></a>
                                </li>
                                <li><a href="edit-profile.html"><i
                                            data-feather="settings"></i><span>Settings</span></a></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" id="logout-form">
                                        @csrf
                                        <button type="submit"
                                            style="background: none; border: none; color: inherit; padding: 0; font: inherit; cursor: pointer;">
                                            <i data-feather="log-in"></i><span>Log Out</span>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>


                {{-- <script class="result-template" type="text/x-handlebars-template">
            <div class="ProfileCard u-cf">
            <div class="ProfileCard-avatar"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-airplay m-0"><path d="M5 17H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-1"></path><polygon points="12 15 17 21 7 21 12 15"></polygon></svg></div>
            <div class="ProfileCard-details">
            <div class="ProfileCard-realName">{{name}}</div>
            </div>
            </div>
          </script> --}}
                <script class="empty-template" type="text/x-handlebars-template"><div class="EmptyMessage">Your search turned up 0 results. This most likely means the backend is down, yikes!</div></script>
            </div>
        </div>
        <!-- Page Header Ends-->
        <!-- Page body Start -->
        <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <div class="sidebar-wrapper" data-layout="stroke-svg">
                <div>
                    <div class="logo-wrapper"><a href="{{ route('dashboard') }}"> <img class="img-fluid for-light"
                                src="{{ asset('assets/images/logo/humma.jpg') }}" alt=""></a>
                        {{-- <div class="toggle-sidebar">
                <svg class="sidebar-toggle">
                  <use href="../assets/svg/icon-sprite.svg#toggle-icon"></use>
                </svg>
              </div> --}}
                    </div>
                    <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid"
                                src="../assets/images/logo/logo-icon.png" alt=""></a></div>
                    <nav class="sidebar-main">
                        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
                        <div id="sidebar-menu">
                            <ul class="sidebar-links" id="simple-bar">
                                <li class="back-btn"><a href="index.html"><img class="img-fluid"
                                            src="../assets/images/logo/logo-icon.png" alt=""></a>
                                    <div class="mobile-back text-end"><span>Back</span><i
                                            class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                                </li>
                                <li class="pin-title sidebar-main-title">
                                    <div>
                                        <h6>Pinned</h6>
                                    </div>
                                </li>
                                <li class="sidebar-main-title">
                                    <div>
                                        <h6 class="lan-1">General</h6>
                                    </div>
                                </li>
                                <li class="sidebar-list"><i class=""></i><a class="sidebar-link"
                                        href="{{ route('dashboard') }}">
                                        <i class="fa fa-home " style="font-size: 20px"></i>
                                        <svg class="fill-icon">
                                            <use href="../assets/svg/icon-sprite.svg#fill-home"></use>
                                        </svg><span class="lan-3"></span></a>
                                </li>

                                <li class="sidebar-main-title">
                                    <div>
                                        <h6 class="">Data Mobil</h6>
                                    </div>
                                </li>
                                @if (auth()->user()->hasRole('user'))
                                    <li class="sidebar-list"><i class=""></i><a class="sidebar-link"
                                            href="{{ route('car.index') }}">
                                            <i class="fa fa-shopping-bag"></i>
                                            <svg class="fill-icon">
                                                <use href="../assets/svg/icon-sprite.svg#fill-widget"></use>
                                            </svg><span class="">Jenis Mobil</span></a>
                                    </li>
                                    <!-- Garis setelah Jenis Mobil -->
                                    <li>
                                        <hr style="border-bottom: 1px solid #7a7979; margin: 10px 0;">
                                    </li>

                                    <li class="sidebar-main-title">
                                        <div>
                                            <h6 class="">Transaksi</h6>
                                        </div>
                                    </li>
                                    <li class="sidebar-list"><i class=""></i><a class="sidebar-link "
                                            href="{{ route('aproval.index') }}">
                                            <i class="fa fa-calendar-check"></i>
                                            <svg class="fill-icon">
                                                <use href="../assets/svg/icon-sprite.svg#fill-widget"></use>
                                            </svg><span class="">Approval Sewa</span></a>
                                    </li>
                                    <li class="sidebar-list"><i class=""></i><a class="sidebar-link "
                                            href="#">
                                            <i class="fa fa-history"></i>
                                            <svg class="fill-icon">
                                                <use href="../assets/svg/icon-sprite.svg#fill-widget"></use>
                                            </svg><span class="">Data Sewa & Riwayat</span></a>
                                    </li>

                                    <!-- Garis setelah Jenis Mobil -->
                                    <li>
                                        <hr style="border-bottom: 1px solid #7a7979; margin: 10px 0;">
                                    </li>

                                    <li class="sidebar-main-title">
                                        <div>
                                            <h6 class="">User</h6>
                                        </div>
                                    </li>
                                    {{-- <li class="sidebar-list"><i class=""></i><a class="sidebar-link " href="{{ route('aproval.index') }}">
                    <i class="fa fa-user-check"></i>
                    <svg class="fill-icon">
                        <use href="../assets/svg/icon-sprite.svg#fill-widget"></use>
                      </svg><span class="">Approval User</span></a>
                  </li> --}}

                                    </li>
                                    <li class="sidebar-list"><i class=""></i><a class="sidebar-link "
                                            href="{{ route('car_likes.index') }}">
                                            <i class="fa fa-users"></i>
                                            <svg class="fill-icon">
                                                <use href="../assets/svg/icon-sprite.svg#fill-widget"></use>
                                            </svg><span class="">car likes</span></a>
                                    </li>
                                    <li class="sidebar-list"><i class=""></i><a class="sidebar-link "
                                            href="#">
                                            <i class="fa fa-star"></i>
                                            <svg class="fill-icon">
                                                <use href="../assets/svg/icon-sprite.svg#fill-widget"></use>
                                            </svg><span class="">Review</span></a>
                                    </li>
                                @else
                                    <li class="sidebar-list"><i class=""></i><a class="sidebar-link"
                                            href="{{ route('merek.index') }}">
                                            <i class="fa fa-car"></i>
                                            <svg class="fill-icon">
                                                <use href="../assets/svg/icon-sprite.svg#fill-widget"></use>
                                            </svg><span class="">Merek Mobil</span></a>
                                    </li>
                                    <li class="sidebar-list"><i class=""></i><a class="sidebar-link"
                                            href="{{ route('car.index') }}">
                                            <i class="fa fa-shopping-bag"></i>
                                            <svg class="fill-icon">
                                                <use href="../assets/svg/icon-sprite.svg#fill-widget"></use>
                                            </svg><span class="">Jenis Mobil</span></a>
                                    </li>
                                    <!-- Garis setelah Jenis Mobil -->
                                    <li>
                                        <hr style="border-bottom: 1px solid #7a7979; margin: 10px 0;">
                                    </li>

                                    <li class="sidebar-main-title">
                                        <div>
                                            <h6 class="">Transaksi</h6>
                                        </div>
                                    </li>
                                    <li class="sidebar-list"><i class=""></i><a class="sidebar-link "
                                            href="{{ route('aproval.index') }}">
                                            <i class="fa fa-calendar-check"></i>
                                            <svg class="fill-icon">
                                                <use href="../assets/svg/icon-sprite.svg#fill-widget"></use>
                                            </svg><span class="">Approval Sewa</span></a>
                                    </li>
                                    <li class="sidebar-list"><i class=""></i><a class="sidebar-link "
                                            href="{{ route('bookings.index') }}">
                                            <i class="fa fa-history"></i>
                                            <svg class="fill-icon">
                                                <use href="../assets/svg/icon-sprite.svg#fill-widget"></use>
                                            </svg><span class="">Data Sewa & Riwayat</span></a>
                                    </li>

                                    <!-- Garis setelah Jenis Mobil -->
                                    <li>
                                        <hr style="border-bottom: 1px solid #7a7979; margin: 10px 0;">
                                    </li>

                                    <li class="sidebar-main-title">
                                        <div>
                                            <h6 class="">User</h6>
                                        </div>
                                    </li>
                                    {{-- <li class="sidebar-list"><i class=""></i><a class="sidebar-link " href="{{ route('aproval.index') }}">
                    <i class="fa fa-user-check"></i>
                    <svg class="fill-icon">
                        <use href="../assets/svg/icon-sprite.svg#fill-widget"></use>
                      </svg><span class="">Approval User</span></a>
                  </li> --}}
                                    <li class="sidebar-list"><i class=""></i><a class="sidebar-link "
                                            href="{{ route('user.index') }}">
                                            <i class="fa fa-users"></i>
                                            <svg class="fill-icon">
                                                <use href="../assets/svg/icon-sprite.svg#fill-widget"></use>
                                            </svg><span class="">Daftar User</span></a>
                                    </li>
                                    </li>
                                    <li class="sidebar-list"><i class=""></i><a class="sidebar-link "
                                            href="{{ route('car_likes.index') }}">
                                            <i class="fa fa-users"></i>
                                            <svg class="fill-icon">
                                                <use href="../assets/svg/icon-sprite.svg#fill-widget"></use>
                                            </svg><span class="">car likes</span></a>
                                    </li>
                                    <li class="sidebar-list"><i class=""></i><a class="sidebar-link "
                                            href="#">
                                            <i class="fa fa-star"></i>
                                            <svg class="fill-icon">
                                                <use href="../assets/svg/icon-sprite.svg#fill-widget"></use>
                                            </svg><span class="">Review</span></a>
                                    </li>
                                @endif
                        </div>
                        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
                    </nav>
                </div>
            </div>
            <!-- Page Sidebar Ends-->
            <div class="page-body">
                @yield('content')
                @include('sweetalert::alert')
            </div>

            <!-- footer start-->

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- latest jquery-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <!-- Bootstrap js-->
    <!-- Bootstrap js -->
    <script src="{{ asset('assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <!-- Feather icon js -->
    <script src="{{ asset('assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/icons/feather-icon/feather-icon.js') }}"></script>
    <!-- Scrollbar js -->
    <script src="{{ asset('assets/js/scrollbar/simplebar.js') }}"></script>
    <script src="{{ asset('assets/js/scrollbar/custom.js') }}"></script>
    <!-- Sidebar jquery -->
    <script src="{{ asset('assets/js/config.js') }}"></script>
    <!-- Plugins JS start -->
    <script src="{{ asset('assets/js/sidebar-menu.js') }}"></script>
    <script src="{{ asset('assets/js/sidebar-pin.js') }}"></script>
    <script src="{{ asset('assets/js/slick/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/slick/slick.js') }}"></script>
    <script src="{{ asset('assets/js/header-slick.js') }}"></script>
    <script src="{{ asset('assets/js/chart/morris-chart/raphael.js') }}"></script>
    <script src="{{ asset('assets/js/chart/morris-chart/morris.js') }}"></script>
    <script src="{{ asset('assets/js/chart/morris-chart/prettify.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/apex-chart.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/stock-prices.js') }}"></script>
    <script src="{{ asset('assets/js/chart/apex-chart/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/notify/bootstrap-notify.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/default.js') }}"></script>
    <script src="{{ asset('assets/js/notify/index.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom.js') }}"></script>
    <script src="{{ asset('assets/js/datatable/datatables/datatable.custom1.js') }}"></script>
    <script src="{{ asset('assets/js/owlcarousel/owl.carousel.js') }}"></script>
    <script src="{{ asset('assets/js/owlcarousel/owl-custom.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead/typeahead.custom.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/handlebars.js') }}"></script>
    <script src="{{ asset('assets/js/typeahead-search/typeahead-custom.js') }}"></script>
    <script src="{{ asset('assets/js/height-equal.js') }}"></script>
    <!-- Plugins JS Ends -->
    <!-- Theme js -->
    <script src="{{ asset('assets/js/script.js') }}"></script>

    {{-- sweetalert --}}
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

<!-- Mirrored from admin.pixelstrap.net/zono/template/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2024 14:47:43 GMT -->

</html>
