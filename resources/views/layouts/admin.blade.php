<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="EquityWorld Futures">
    <meta name="author" content="Ranca Gigih Pramuditha">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('namaPage') - EquityWorld Futures</title>

    <!-- Fonts -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">
    <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}">
    <meta name="theme-color" content="#ffffff">
    
    <style>
        /* Global Styles */
        :root {
            --ewf-orange: #F2AC59;
            --ewf-gray: #9B9FA7;
            --ewf-dark-gray: #4C4C4C;
            --ewf-white: #FFFFFF;
            --ewf-black: #000000;
        }

        /* Sidebar Styles */
        .sidebar {
            background-color: var(--ewf-white) !important;
        }

        /* Hover State */
        .sidebar .nav-item .nav-link:hover {
            background-color: rgba(242, 172, 89, 0.1);
            color: var(--ewf-orange) !important;
        }
        
        .sidebar .nav-item .nav-link:hover i,
        .sidebar .nav-item .nav-link:hover span {
            color: var(--ewf-orange) !important;
        }
        
        /* Active State */
        .sidebar .nav-item.active > .nav-link,
        .sidebar .nav-item .collapse-item.active {
            background-color: rgba(242, 172, 89, 0.1);
            color: var(--ewf-orange) !important;
            font-weight: 600;
            border-left: 3px solid var(--ewf-orange);
        }
        
        .sidebar .nav-item.active > .nav-link i,
        .sidebar .nav-item .collapse-item.active i {
            color: var(--ewf-orange) !important;
        }
        
        /* Submenu Styles */
        .sidebar .collapse-item {
            color: var(--ewf-dark-gray) !important;
        }
        
        .sidebar .collapse-item:not(.active) {
            color: var(--ewf-dark-gray) !important;
        }
        
        .sidebar .collapse-item:hover,
        .sidebar .collapse-item:focus {
            background-color: rgba(242, 172, 89, 0.1);
            color: var(--ewf-orange) !important;
        }
        
        .sidebar .collapse-item.active {
            background-color: rgba(242, 172, 89, 0.1);
            color: var(--ewf-orange) !important;
            font-weight: 600;
        }
        
        /* Top Navigation */
        .topbar {
            background-color: var(--ewf-white);
            border-bottom: 1px solid #eee;
        }

        /* Buttons */
        .btn-primary {
            background-color: var(--ewf-orange);
            border-color: var(--ewf-orange);
        }

        .btn-primary:hover {
            background-color: #e09b3f;
            border-color: #e09b3f;
        }

        /* Text Colors */
        .text-primary {
            color: var(--ewf-orange) !important;
        }

        /* Card Header */
        .card-header {
            background-color: var(--ewf-white);
            border-bottom: 1px solid #eee;
            color: var(--ewf-dark-gray);
        }
    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-white sidebar sidebar-light accordion z-200 shadow" id="accordionSidebar" style="background-color: #ffffff !important; border-right: 1px solid #eee;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('img/ewf-logo2.png') }}" alt="Logo EWF" class="img-fluid"
                        style="width: 1000px; height: auto;">
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Nav::isRoute('home') }}">
                <a class="nav-link {{ Nav::isRoute('home') }}" href="{{ route('home') }}" style="color: #00000;">
                    <i class="fas fa-fw fa-tachometer-alt" style="color: #00000;"></i>
                    <span style="color: #00000;">{{ __('Dashboard') }}</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading" style="color: #00000;">
                {{ __('Menu') }}
            </div>

            <!-- Nav Item - Produk Collapse Menu -->
            <li class="nav-item {{ Nav::isRoute('jfx.*') || Nav::isRoute('spa.*') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduk"
                    aria-expanded="{{ Nav::isRoute('jfx.*') || Nav::isRoute('spa.*') ? 'true' : 'false' }}"
                    aria-controls="collapseProduk" style="color: #00000;">
                    <i class="fas fa-box-open" style="color: #00000;"></i>
                    <span style="color: #00000;">Produk</span>
                </a>
                <div id="collapseProduk" class="collapse" aria-labelledby="headingProduk"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manajemen Produk:</h6>
                        <a class="collapse-item {{ Nav::isRoute('jfx.*') ? 'active' : '' }}"
                            href="{{ route('jfx.index') }}">
                            Produk Multilateral JFX
                        </a>
                        <a class="collapse-item {{ Nav::isRoute('spa.*') ? 'active' : '' }}"
                            href="{{ route('spa.index') }}">
                            Produk Bilateral (SPA)
                        </a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Profile -->
            <li class="nav-item {{ Nav::isRoute('berita.*') }}">
                <a class="nav-link" href="{{ route('berita.index') }}" style="color: #00000;">
                    <i class="fa-solid fa-newspaper" style="color: #00000;"></i>
                    <span style="color: #00000;">{{ __('pengumuman') }}</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading" style="color: #00000;">
                {{ __('Pengaturan') }}
            </div>

            <li class="nav-item {{ Nav::isRoute('profileWeb.*') }}">
                <a class="nav-link" href="{{ route('profileWeb.index') }}" style="color: #00000;">
                    <i class="fas fa-fw fa-globe" style="color: #00000;"></i>
                    <span style="color: #00000;">{{ __('Pengaturan Website') }}</span>
                </a>
            </li>

            <!-- Nav Item - About -->
            <li class="nav-item {{ Nav::isRoute('kategori-wakil.*') }}">
                <a class="nav-link" href="{{route('kategori-wakil.index')}}" style="color: #00000;">
                    <i class="fas fa-fw fa-hands-helping" style="color: #00000;"></i>
                    <span style="color: #00000;">{{ __('Wakil Pialang') }}</span>
                </a>
            </li>

            <!-- Nav Item - About -->
            <li class="nav-item {{ Nav::isRoute('banner.*') }}">
                <a class="nav-link" href="{{route('banner.index')}}" style="color: #00000;">
                    <i class="fa-solid fa-images" style="color: #00000;"></i>
                    <span style="color: #00000;">{{ __('Banner') }}</span>
                </a>
            </li>

            <!-- Nav Item - About -->
            <li class="nav-item {{ Nav::isRoute('karier.*') }}">
                <a class="nav-link" href="{{route('karier.index')}}" style="color: #00000;">
                    <i class="fa-solid fa-briefcase" style="color: #00000;"></i>
                    <span style="color: #00000;">{{ __('Karier') }}</span>
                </a>
            </li>

            <!-- Nav Item - About -->
            <!--li class="nav-item {{ Nav::isRoute('file.*') }}">
                <a class="nav-link" href="" style="color: #00000;">
                    <i class="fa-solid fa-file" style="color: #00000;"></i>
                    <span style="color: #00000;">{{ __('File Unduhan') }}</span>
                </a>
            </li>-->

            <hr class="sidebar-divider">

            <!-- Heading -->
            <!--div class="sidebar-heading" style="color: #00000;">
                {{ __('Manajemen Pengguna') }}
            </div-->

            <!-- Nav Item - Profile -->
            <!--li class="nav-item {{ Nav::isRoute('user.*') }}">
                <a class="nav-link" href="" style="color: #00000;">
                    <i class="fas fa-fw fa-user" style="color: #00000;"></i>
                    <span style="color: #00000;">{{ __('User') }}</span>
                </a>
            </li>-->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column ">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow" style="border-bottom: 1px solid #eee;">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name
                                    }}</span>
                                <figure class="img-profile rounded-circle avatar font-weight-bold"
                                    data-initial="{{ Auth::user()->name[0] }}" 
                                    style="background-color: var(--ewf-orange) !important;"></figure>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2" style="color: var(--ewf-orange);"></i>
                                    <span style="color: var(--ewf-dark-gray);">{{ __('Profile') }}</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal"
                                    data-target="#logoutModal" style="color: #dc3545;">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                                    <span>{{ __('Logout') }}</span>
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('main-content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top" style="background-color: var(--ewf-orange);">
        <i class="fas fa-angle-up" style="color: white;"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" style="color: var(--ewf-dark-gray);">{{ __('Ready to Leave?') }}</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: var(--ewf-gray);">×</span>
                    </button>
                </div>
                <div class="modal-body" style="color: var(--ewf-dark-gray);">{{ __('Select "Logout" below if you are ready to end your current session.') }}</div>
                <div class="modal-footer">
                    <button class="btn btn-outline-secondary" type="button" data-dismiss="modal" style="color: var(--ewf-dark-gray); border-color: var(--ewf-gray);">{{ __('Cancel') }}</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" style="background-color: var(--ewf-orange); border-color: var(--ewf-orange);">{{ __('Logout') }}</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="sticky-footer bg-white" style="border-top: 1px solid #eee;">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span style="color: var(--ewf-gray);">Copyright &copy; {{ config('app.name') }} {{ date('Y') }}</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    <!-- Scripts -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    
    <!-- Stack for scripts from child views -->
    @stack('scripts')
</body>

</html>
