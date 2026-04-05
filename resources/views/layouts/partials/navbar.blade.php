    <div class="main-nav-wrapper">
        <div class="main-nav2">
            <div class="menu-close-btn"><i class="bi bi-x-lg"></i></div>
            <div class="mobile-logo-area d-flex justify-content-start align-items-center">
                <div class="header-logo">
                    <a href="{{ route('home') }}"><img alt="image" class="img-fluid" src="{{ asset('assets/img/logo.png') }}" style="max-width: 200px;"></a>
                </div>
            </div>
            <div class="sidebar-menu-area">
                <ul class="menu-list">
                    <li class="menu-item"><a href="{{ route('home') }}" data-hover='Home'>Home</a></li>
                    <li class="menu-item"><a href="{{ route('about') }}" data-hover='About'>About</a></li>
                    <li class="menu-item"><a href="{{ route('service') }}" data-hover='Service'>Service</a></li>
                    <li class="menu-item"><a href="{{ route('project') }}" data-hover='Project'>Project</a></li>
                    <!-- <li class="menu-item"><a href="{{ route('blog') }}" data-hover='Blog'>Blog</a></li> -->
                    <li class="menu-item"><a href="{{ route('contact') }}" data-hover='Contact'>Contact</a></li>
                    @guest
                        <li class="menu-item"><a href="{{ route('login') }}" data-hover='Login'>Login</a></li>
                    @else
                        <li class="menu-item"><a href="{{ auth()->user()->is_admin ? route('admin.dashboard') : route('dashboard') }}" data-hover='Dashboard'>Dashboard</a></li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>

    <div class="main-container">
        <div class="sidebar-wrapper">
            <div class="header-logo">
                <a href="{{ route('home') }}"><img src="{{ asset('assets/img/letter.png') }}" alt="" style="max-width: 50px;"></a>
            </div>
            <div class="sidebar-button mobile-menu-btn">
                <span></span>
            </div>
            <div class="header-btn">
                <a class="primary-btn6" href="{{ route('contact') }}">Get A Quote</a>
            </div>
        </div>

        <div class="main-content">
            <header class="header5 d-lg-none d-flex">
                <div class="header-logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('assets/img/logo.png') }}" alt="" style="max-width: 200px;"></a>
                </div>
                <div class="sidebar-button mobile-menu-btn2">
                    <span></span>
                </div>
            </header>
