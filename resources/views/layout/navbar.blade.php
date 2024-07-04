<div class="container-fluid bg-primary px-5 d-none d-lg-block">
    <div class="row gx-0">
        <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <!-- Social media buttons -->
            </div>
        </div>
        <div class="col-lg-4 text-center text-lg-end">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <a href="{{ route('register') }}"><small class="me-3 text-light"><i class="fa fa-user me-2"></i>Register</small></a>
                @auth
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle text-light" data-bs-toggle="dropdown">
                        <small><i class="fa fa-home me-2"></i>{{ Auth::user()->email }}</small>
                    </a>
                    <div class="dropdown-menu rounded">
                        <a href="{{ route('account.change-password-form') }}" class="dropdown-item">
                            <i class="fas fa-lock me-2"></i> Change Password
                        </a>
                        <a href="#" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-power-off me-2"></i> Log Out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                @else
                <a href="{{ route('login') }}" class="dropdown-toggle text-light">
                    <small><i class="fa fa-home me-2"></i> Login</small>
                </a>
                @endauth
            </div>
        </div>
    </div>
</div>

<div class="container-fluid position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="{{ route('home') }}" class="navbar-brand p-0">
            <h1 class="m-0 text-primary"><i class="fa fa-map-marker-alt me-3"></i>MCL Tour Madiun</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="{{ route('home') }}" class="nav-item nav-link{{ request()->is('/') ? ' active' : '' }}">Beranda</a>
                <a href="{{ route('about') }}" class="nav-item nav-link{{ request()->is('about') ? ' active' : '' }}">Tentang</a>
                <a href="{{ route('service') }}" class="nav-item nav-link{{ request()->is('services') ? ' active' : '' }}">Servis</a>
                <a href="{{ route('packages') }}" class="nav-item nav-link{{ request()->is('packages') ? ' active' : '' }}">Paket</a>
                <a href="{{ route('contact') }}" class="nav-item nav-link">Kontak</a>
            </div>
            @auth
            <a href="{{ route('booking') }}" class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4">Pesan Sekarang</a>
            @endauth
        </div>
    </nav>
</div>