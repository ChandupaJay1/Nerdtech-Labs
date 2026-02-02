<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Nerdtech Labs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #06D889;
            --dark-bg: #111111;
            --sidebar-width: 250px;
        }
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background-color: var(--dark-bg);
            color: white;
            padding-top: 20px;
            z-index: 1000;
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.7);
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: 0.3s;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            color: var(--primary-color);
            background: rgba(6, 216, 137, 0.1);
        }
        .sidebar .nav-link i {
            font-size: 1.2rem;
        }
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 30px;
            min-height: 100vh;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }
        .btn-primary:hover {
            background-color: #05b874;
            border-color: #05b874;
        }
        .navbar-brand {
            padding: 0 20px 20px;
            font-weight: 700;
            color: var(--primary-color) !important;
            font-size: 1.5rem;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <a class="navbar-brand d-block" href="{{ route('home') }}">Nerdtech Labs</a>
    <nav class="nav flex-column">
        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
            <i class="bi bi-speedometer2"></i> Dashboard
        </a>
        <a class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}" href="{{ route('admin.services.index') }}">
            <i class="bi bi-gear"></i> Services
        </a>
        <a class="nav-link {{ request()->routeIs('admin.projects.*') ? 'active' : '' }}" href="{{ route('admin.projects.index') }}">
            <i class="bi bi-briefcase"></i> Projects
        </a>
        <div class="mt-auto p-4">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="nav-link text-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </form>
        </div>
    </nav>
</div>

<div class="main-content">
    <header class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4">@yield('title')</h2>
        <div class="user-profile">
            <span class="me-2">Admin</span>
            <img src="https://ui-avatars.com/api/?name=Admin&background=06D889&color=fff" class="rounded-circle" width="35" alt="Admin">
        </div>
    </header>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
