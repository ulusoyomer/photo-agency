<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid d-flex align-items-center justify-content-between">

        <a href="{{ route('home') }}" class="logo d-flex align-items-center  me-auto me-lg-0">
            <img src="{{ $settings->site_image }}" alt="">
            <h1>{{ $settings->title }}</h1>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="{{ route('home') }}" class="{{ Route::is('home') ? 'active' : '' }}">Anasayfa</a></li>
                <li><a href="{{ route('about') }}" class="{{ Route::is('about') ? 'active' : '' }}">Hakkımızda</a></li>
                <li><a href="{{ route('contact') }}" class="{{ Route::is('contact') ? 'active' : '' }}">Bize Ulaşın</a></li>
            </ul>
        </nav><!-- .navbar -->

        <div class="header-social-links">
            @if ($settings->twitter)
                <a href="{{ $settings->twitter }}" class="twitter"><i class="bi bi-twitter"></i></a>
            @endif
            @if ($settings->facebook)
            <a href="{{ $settings->facebook }}" class="facebook"><i class="bi bi-facebook"></i></a>
            @endif
            @if ($settings->instagram)
            <a href="{{ $settings->instagram }}" class="instagram"><i class="bi bi-instagram"></i></a>
            @endif
            @if ($settings->linkedin)
            <a href="{{ $settings->linkedin }}" class="linkedin"><i class="bi bi-linkedin"></i></a>
            @endif
            @if ($settings->youtube)
            <a href="{{ $settings->youtube }}" class="twitter"><i class="bi bi-youtube"></i></a>
            @endif
        </div>
        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
</header>
<!-- End Header -->
