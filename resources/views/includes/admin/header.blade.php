<nav class="navbar navbar-dark bg-dark position-sticky" style="z-index: 20; top: 0;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('admin.home') }}">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
            aria-controls="offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
            aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Admin Panel</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('admin.home') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('admin.home') }}">Postlar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('admin.post') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('admin.post') }}">Yeni Post Oluştur</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('admin.settings') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('admin.settings') }}">Site Ayarları</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('admin.message') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('admin.message') }}">Mesajlar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Route::is('admin.register') ? 'active' : '' }}" aria-current="page"
                            href="{{ route('admin.register') }}">Admin Oluştur - Sil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" aria-current="page" href="{{ route('admin.logout') }}">Çıkış</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
