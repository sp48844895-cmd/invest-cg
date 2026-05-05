<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - Invest CG</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap">
<link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}?v={{ @filemtime(public_path('assets/css/admin.css')) }}">
    @stack('styles')
</head>
<body class="admin-body">

    <!-- Sidebar Overlay (mobile) -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="sidebar-brand">
            <div class="brand-logo">
                <i class="bi bi-shield-check"></i>
            </div>
            <div class="brand-text">
                <span class="brand-name">Invest CG</span>
                <span class="brand-sub">Admin Panel</span>
            </div>
            <button class="sidebar-close-btn d-lg-none" id="sidebarClose">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <div class="sidebar-menu">
            <div class="menu-section">
                <span class="menu-label">Main</span>
            </div>
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Dashboard</span>
            </a>

            <div class="menu-section">
                <span class="menu-label">Content</span>
            </div>
            <a href="{{ route('admin.policy-documents.index') }}" class="sidebar-link {{ request()->routeIs('admin.policy-documents.*') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-pdf-fill"></i>
                <span>Policy Documents</span>
            </a>
            <a href="{{ route('admin.gallery.index') }}" class="sidebar-link {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                <i class="bi bi-images"></i>
                <span>Gallery</span>
            </a>
            <a href="{{ route('admin.media-updates.index') }}" class="sidebar-link {{ request()->routeIs('admin.media-updates.*') ? 'active' : '' }}">
                <i class="bi bi-newspaper"></i>
                <span>Media Updates</span>
            </a>
            <a href="{{ route('admin.press-releases.index') }}" class="sidebar-link {{ request()->routeIs('admin.press-releases.*') ? 'active' : '' }}">
                <i class="bi bi-megaphone-fill"></i>
                <span>Press Releases</span>
            </a>
            <a href="{{ route('admin.user-manuals.index') }}" class="sidebar-link {{ request()->routeIs('admin.user-manuals.*') ? 'active' : '' }}">
                <i class="bi bi-book-fill"></i>
                <span>User Manuals</span>
            </a>
            <a href="{{ route('admin.contact-persons.index') }}" class="sidebar-link {{ request()->routeIs('admin.contact-persons.*') ? 'active' : '' }}">
                <i class="bi bi-person-lines-fill"></i>
                <span>Contact Persons</span>
            </a>

            <div class="menu-section">
                <span class="menu-label">Startups</span>
            </div>
            <a href="{{ route('admin.startup-notifications.index') }}" class="sidebar-link {{ request()->routeIs('admin.startup-notifications.*') ? 'active' : '' }}">
                <i class="bi bi-bell-fill"></i>
                <span>Notifications</span>
            </a>
            <a href="{{ route('admin.startup-events.index') }}" class="sidebar-link {{ request()->routeIs('admin.startup-events.*') ? 'active' : '' }}">
                <i class="bi bi-calendar-event-fill"></i>
                <span>Events</span>
            </a>

            <div class="menu-section">
                <span class="menu-label">Account</span>
            </div>
            <a href="{{ route('admin.users.edit') }}" class="sidebar-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <i class="bi bi-person-gear"></i>
                <span>Edit Profile</span>
            </a>
        </div>

        <div class="sidebar-footer d-flex align-items-center">
            <div class="user-avatar">
                <i class="bi bi-person-circle"></i>
            </div>
            <div class="user-info">
                <span class="user-display-name">{{ Auth::user()->name }}</span>
                <span class="user-role">Administrator</span>
            </div>
        </div>
    </aside>

    <!-- Main Wrapper -->
    <div class="admin-main" id="adminMain">
        <!-- Top Navbar -->
        <header class="admin-navbar">
            <div class="navbar-left">
                <button class="hamburger-btn" id="sidebarToggle" type="button">
                    <i class="bi bi-list"></i>
                </button>
                <div class="page-info">
                    <h1 class="page-heading">@yield('page-title', 'Dashboard')</h1>
                </div>
            </div>
            <div class="navbar-right">
                <div class="navbar-user">
                    <span class="user-greeting">{{ Auth::user()->name }}</span>
                    <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="logout-btn" title="Logout">
                            <i class="bi bi-box-arrow-right"></i>
                            <span class="logout-text">Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </header>

        <!-- Content -->
        <main class="admin-content">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-circle-fill me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><i class="bi bi-exclamation-triangle-fill me-2"></i>Please fix the following:</strong>
                    <ul class="mb-0 mt-2">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="admin-footer">
            <span>&copy; {{ date('Y') }} Invest CG. All rights reserved.</span>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    (function() {
        const sidebar = document.getElementById('adminSidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const toggleBtn = document.getElementById('sidebarToggle');
        const closeBtn = document.getElementById('sidebarClose');
        const body = document.body;

        function openSidebar() {
            body.classList.add('sidebar-open');
        }
        function closeSidebar() {
            body.classList.remove('sidebar-open');
        }
        function toggleSidebarDesktop() {
            body.classList.toggle('sidebar-collapsed');
        }

        if (toggleBtn) {
            toggleBtn.addEventListener('click', function() {
                if (window.innerWidth < 992) {
                    openSidebar();
                } else {
                    toggleSidebarDesktop();
                }
            });
        }
        if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
        if (overlay) overlay.addEventListener('click', closeSidebar);

        window.addEventListener('resize', function() {
            if (window.innerWidth >= 992) {
                body.classList.remove('sidebar-open');
            }
        });
    })();
    </script>
    @stack('scripts')
</body>
</html>

