<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dashboard Admin Disperindagkop Kalimantan Utara">
    <meta name="author" content="Disperindagkop Kaltara">
    <meta name="theme-color" content="#3b82f6">
    <title>Disperindagkop | @yield('title')</title>
    
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:300,400,500,600,700&display=swap" rel="stylesheet" />
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    
    <!-- AdminLTE CSS -->
    <link href="{{ asset('css/admin-lte/adminlte.css') }}" rel="stylesheet">
    
    <!-- OverlayScrollbars -->
    <link href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #3b82f6;
            --secondary-color: #1e40af;
            --accent-color: #60a5fa;
            --success-color: #10b981;
            --warning-color: #f59e0b;
            --danger-color: #ef4444;
            --info-color: #3b82f6;
        }
        
        body {
            font-family: 'Figtree', sans-serif;
        }
        
        .brand-link .brand-image {
            max-height: 40px;
            transition: all 0.2s ease;
        }
        
        .brand-link:hover .brand-image {
            opacity: 1 !important;
        }
        
        .user-menu .dropdown-menu {
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            border-radius: 0.5rem;
        }
        
        .user-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        }
        
        .nav-sidebar .nav-link.active {
            background-color: var(--primary-color);
            color: #fff;
        }
        
        .nav-sidebar .nav-link:hover {
            background-color: rgba(59, 130, 246, 0.1);
        }
        
        .app-sidebar {
            background: linear-gradient(180deg, #1e293b, #0f172a);
        }
        
        .app-content-header {
            background-color: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .app-footer {
            border-top: 1px solid #e2e8f0;
            background-color: #f8fafc;
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        
        .btn-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        
        .breadcrumb-item.active {
            color: var(--primary-color);
        }
        
        /* Toast styling */
        .toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }
        
        .toast {
            min-width: 300px;
        }
    </style>
    
    @yield('styles')
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--begin::Header-->
        <nav class="app-header navbar navbar-expand bg-white shadow-sm">
            <!--begin::Container-->
            <div class="container-fluid">
                <!--begin::Start Navbar Links-->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                            <i class="bi bi-list"></i>
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block">
                        <a href="{{ route('dashboard.index') }}" class="nav-link">
                            <i class="bi bi-house-door me-1"></i>Beranda
                        </a>
                    </li>
                    <li class="nav-item d-none d-md-block">
                        <a href="{{ route('home') }}" class="nav-link" target="_blank">
                            <i class="bi bi-globe me-1"></i>Lihat Website
                        </a>
                    </li>
                </ul>
                <!--end::Start Navbar Links-->

                <!--begin::End Navbar Links-->
                <ul class="navbar-nav ms-auto">
                    <!--begin::Notifications Dropdown-->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-bs-toggle="dropdown" href="#">
                            <i class="bi bi-bell"></i>
                            <span class="badge bg-danger rounded-pill navbar-badge">3</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <span class="dropdown-item dropdown-header">3 Notifikasi</span>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="bi bi-envelope me-2"></i> 4 pesan baru
                                <span class="float-end text-muted text-sm">3 menit</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="bi bi-users me-2"></i> 8 permintaan
                                <span class="float-end text-muted text-sm">12 jam</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="bi bi-file-earmark-text me-2"></i> 3 laporan baru
                                <span class="float-end text-muted text-sm">2 hari</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item dropdown-footer">Lihat Semua Notifikasi</a>
                        </div>
                    </li>
                    <!--end::Notifications Dropdown-->
                    
                    <!--begin::User Menu Dropdown-->
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img src="{{ asset('img/user.jpg') }}" class="user-image rounded-circle shadow" alt="User Image">
                            <span class="d-none d-md-inline">{{ Auth::user()->name ?? 'Administrator' }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                            <!--begin::User Image-->
                            <li class="user-header text-bg-primary rounded-top">
                                <img src="{{ asset('img/user.jpg') }}" class="rounded-circle shadow" alt="User Image">
                                <p>
                                    {{ Auth::user()->name ?? 'Administrator' }}
                                    <small>Member since {{ Auth::user()->created_at->format('M. Y') ?? 'Nov. 2023' }}</small>
                                </p>
                            </li>
                            <!--end::User Image-->
                            <!--begin::Menu Footer-->
                            <li class="user-footer d-flex justify-content-between p-3">
                                <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-person me-1"></i>Profil
                                </a>
                                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="bi bi-box-arrow-right me-1"></i>Keluar
                                    </button>
                                </form>
                            </li>
                            <!--end::Menu Footer-->
                        </ul>
                    </li>
                    <!--end::User Menu Dropdown-->
                </ul>
                <!--end::End Navbar Links-->
            </div>
            <!--end::Container-->
        </nav>
        <!--end::Header-->

        <!--begin::Sidebar-->
        <aside class="app-sidebar shadow" data-bs-theme="dark">
            <!--begin::Sidebar Brand-->
            <div class="sidebar-brand">
                <!--begin::Brand Link-->
                <a href="{{ route('dashboard.index') }}" class="brand-link">
                    <!--begin::Brand Image-->
                    {{-- <img src="{{ asset('assets/logo.png') }}" alt="Disperindagkop Logo" class="brand-image opacity-75 shadow w-25"> --}}
                    <!--end::Brand Image-->
                    <!--begin::Brand Text-->
                    <span class="brand-text fw-light">Disperindagkop</span>
                    <!--end::Brand Text-->
                </a>
                <!--end::Brand Link-->
            </div>
            <!--end::Sidebar Brand-->

            <!--begin::Sidebar Wrapper-->
            <div class="sidebar-wrapper">
                <nav class="mt-2">
                    <!--begin::Sidebar Menu-->
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                        <li class="nav-item {{ request()->routeIs('dashboard.index') ? 'menu-open' : '' }}">
                            <a href="{{ route('dashboard.index') }}" class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-speedometer2"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        
                        <li class="nav-header">MANAJEMEN DATA</li>
                        
                        <li class="nav-item {{ request()->is('dashboard/news*') ? 'menu-open' : '' }}">
                            <a href="{{ route('dashboard.news.index') }}" class="nav-link {{ request()->routeIs('dashboard.news.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-newspaper"></i>
                                <p>Berita</p>
                            </a>
                        </li>
                        
                        <li class="nav-item {{ request()->is('dashboard/ikm*') || request()->is('dashboard/bigindustri*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->is('dashboard/ikm*') || request()->is('dashboard/bigindustri*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-building"></i>
                                <p>
                                    Industri
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.ikm.index') }}" class="nav-link {{ request()->routeIs('dashboard.ikm.*') ? 'active' : '' }}">
                                        <i class="nav-icon bi bi-circle-fill fs-8 me-1"></i>
                                        <p>Data UKM</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('dashboard.bigindustri.index') }}" class="nav-link {{ request()->routeIs('dashboard.bigindustri.*') ? 'active' : '' }}">
                                        <i class="nav-icon bi bi-circle-fill fs-8 me-1"></i>
                                        <p>Industri Besar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="nav-item {{ request()->is('dashboard/perdagangan*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->is('dashboard/perdagangan*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-shop"></i>
                                <p>
                                    Perdagangan
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon bi bi-circle-fill fs-8 me-1"></i>
                                        <p>Harga Pokok</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon bi bi-circle-fill fs-8 me-1"></i>
                                        <p>Pasar</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="nav-item {{ request()->is('dashboard/koperasi*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->is('dashboard/koperasi*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-people-fill"></i>
                                <p>
                                    Koperasi & UKM
                                    <i class="nav-arrow bi bi-chevron-right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon bi bi-circle-fill fs-8 me-1"></i>
                                        <p>Data Koperasi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon bi bi-circle-fill fs-8 me-1"></i>
                                        <p>Data UKM</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="nav-item {{ request()->is('dashboard/profil*') ? 'menu-open' : '' }}">
                            <a href="{{ route('dashboard.profil.index') }}" class="nav-link {{ request()->routeIs('dashboard.profil.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-building-fill"></i>
                                <p>Profil Dinas</p>
                            </a>
                        </li>

                        <li class="nav-item {{ request()->is('dashboard/bidang*') ? 'menu-open' : '' }}">
                            <a href="{{ route('dashboard.bidang.index') }}" class="nav-link {{ request()->routeIs('dashboard.bidang.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-grid-fill"></i>
                                <p>Bidang</p>
                            </a>
                        </li>
                        
                        <li class="nav-header">PENGATURAN</li>
                        
                        <li class="nav-item {{ request()->is('dashboard/user*') ? 'menu-open' : '' }}">
                            <a href="{{ route('dashboard.user.index') }}" class="nav-link {{ request()->routeIs('dashboard.user.*') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-person-gear"></i>
                                <p>Pengguna</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-gear-fill"></i>
                                <p>Konfigurasi</p>
                            </a>
                        </li>
                    </ul>
                    <!--end::Sidebar Menu-->
                </nav>
            </div>
            <!--end::Sidebar Wrapper-->
        </aside>
        <!--end::Sidebar-->

        <!--begin::App Main-->
        <main class="app-main">
            <!--begin::App Content Header-->
            <div class="app-content-header">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!--begin::Row-->
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0 fw-semibold">@yield('page-title', 'Dashboard')</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Beranda</a></li>
                                @yield('breadcrumb')
                            </ol>
                        </div>
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::App Content Header-->

            <!--begin::App Content-->
            <div class="app-content">
                <!--begin::Container-->
                <div class="container-fluid">
                    <!-- Toast Container -->
                    <div class="toast-container">
                        @if(session('success'))
                        <div class="toast align-items-center text-bg-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                                <div class="toast-body">
                                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                                </div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                        </div>
                        @endif
                        
                        @if(session('error'))
                        <div class="toast align-items-center text-bg-danger border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                                <div class="toast-body">
                                    <i class="bi bi-exclamation-triangle me-2"></i>{{ session('error') }}
                                </div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                        </div>
                        @endif
                        
                        @if(session('warning'))
                        <div class="toast align-items-center text-bg-warning border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                                <div class="toast-body">
                                    <i class="bi bi-exclamation-circle me-2"></i>{{ session('warning') }}
                                </div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                        </div>
                        @endif
                        
                        @if(session('info'))
                        <div class="toast align-items-center text-bg-info border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="d-flex">
                                <div class="toast-body">
                                    <i class="bi bi-info-circle me-2"></i>{{ session('info') }}
                                </div>
                                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                            </div>
                        </div>
                        @endif
                    </div>
                    
                    @yield('content')
                </div>
                <!--end::Container-->
            </div>
            <!--end::App Content-->
        </main>
        <!--end::App Main-->

        <!--begin::Footer-->
        <footer class="app-footer">
            <!--begin::To the end-->
            <div class="float-end d-none d-sm-inline">Version 1.0.0</div>
            <!--end::To the end-->
            <!--begin::Copyright-->
            <strong>
                Copyright &copy; 2024&nbsp;
                <a href="#" class="text-decoration-none">Disperindagkop Kaltara</a>.
            </strong>
            All rights reserved.
            <!--end::Copyright-->
        </footer>
        <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->

    <!--begin::Script-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"></script>
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Required Plugin(popperjs for Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <!--end::Required Plugin(popperjs for Bootstrap 5)-->
    <!--begin::Required Plugin(Bootstrap 5)-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <!--end::Required Plugin(Bootstrap 5)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <script src="{{ asset('js/admin-lte/adminlte.js') }}"></script>
    <!--end::Required Plugin(AdminLTE)-->
    <!--begin::OverlayScrollbars Configure-->
    <script>
        const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
        const Default = {
            scrollbarTheme: 'os-theme-light',
            scrollbarAutoHide: 'leave',
            scrollbarClickScroll: true,
        };
        document.addEventListener('DOMContentLoaded', function () {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
            
            // Initialize and show toasts
            const toastElList = document.querySelectorAll('.toast');
            toastElList.forEach(function(toastEl) {
                const toast = new bootstrap.Toast(toastEl, {
                    autohide: true,
                    delay: 5000
                });
                toast.show();
            });
        });
    </script>
    <!--end::OverlayScrollbars Configure-->
    
    <!-- Additional Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    @yield('scripts')
    <!--end::Script-->
</body>
</html>
