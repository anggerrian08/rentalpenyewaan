<div class="wrapper">
    <div class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
            <div>
                <i class="bi bi-book" style="font-size: 3rem;"></i>
            </div>
            <div>
                <h4 class="logo-text">Library</h4>
            </div>
            <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i></div>
        </div>
        <!--navigation-->
        <ul class="metismenu" id="menu">
            <li>
                <a href="#" class="">
                    <div class="parent-icon"><i class='bx bx-home-circle'></i></div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
            <li class="menu-label">Menu</li>
            <li>
                <a href="{{route('category.index')}}">
                    <div class="parent-icon fa fa-table"></div>
                    <div class="menu-title">Category</div>
                </a>
            </li>
            <li>
                <a href="{{route('plat.index')}}" class="">
                    <div class="parent-icon fa fa-book"></div>
                    <div class="menu-title">Plat</div>
                </a>
            </li>
            <li>
                <a class="" href="{{route('car.index')}}">
                    <div class="parent-icon"><i class="fa fa-user-check"></i></div>
                    <div class="menu-title">car</div>
                </a>
            </li>
            <li>
                <a class="" href="#">
                    <div class="parent-icon"><i class="fa fa-user-check"></i></div>
                    <div class="menu-title">Login Details</div>
                </a>
            </li>
            <li>
                <a class="" href="#">
                    <div class="parent-icon"><i class="fa fa-user"></i></div>
                    <div class="menu-title">User List</div>
                </a>
            </li>
            <li>
                <a class="" href="#">
                    <div class="parent-icon"><i class="bx bx-repeat"></i></div>
                    <div class="menu-title">Ulasan</div>
                </a>
            </li>
            <li>
                <a href="#" class="">
                    <div class="parent-icon fa fa-heart"></div>
                    <div class="menu-title">Favorit Makanan</div>
                </a>
            </li>
            <li>
                <a href="#" class="">
                    <div class="parent-icon"><i class="fa fa-message"></i></div>
                    <div class="menu-title">Pemesanan</div>
                </a>
            </li>
            <li>
                <a class="" href="#">
                    <div class="parent-icon"><i class="fa fa-message"></i></div>
                    <div class="menu-title">Detail Transaksi</div>
                </a>
            </li>
        </ul>
    </div>
</div>
<!--end sidebar wrapper -->

<!--start header -->
<header>
    <div class="topbar d-flex align-items-center">
        <nav class="navbar navbar-expand">
            <div class="mobile-toggle-menu"><i class='bx bx-menu'></i></div>
            <div class="top-menu ms-auto">
                <div class="header-notifications-list"></div>
                <div class="header-message-list"></div>
            </div>
            <div class="user-box dropdown">
                <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{asset('assets/images/avatars/avatar-1.png')}}" class="user-img" alt="user avatar">
                    <div class="user-info ps-3">
                        <p class="user-name mb-0">User Email</p>
                        <p class="designation mb-0">Role</p>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#"><i class="bx bx-user"></i><span>Profile</span></a></li>
                    <li>
                        <div class="dropdown-divider mb-0"></div>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item d-flex align-items-center">
                                <i class='bx bx-log-out-circle me-2'></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
