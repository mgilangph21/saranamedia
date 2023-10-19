<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{ route('home') }}">Sarana Media</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" action="{{ route('logout') }}"
        method="post"> @csrf
        <div class="input-group">
            {{-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                aria-describedby="btnNavbarSearch" /> --}}
            <button class="btn btn-warning" id="btnNavbarSearch" type="submit"><i class="fas fa-sign-out-alt mr-3"></i>
                Keluar</button>
        </div>
    </form>
    <!-- Navbar-->
    {{-- <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#!">Settings</a></li>
                <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li><a class="dropdown-item" href="#!">Keluar</a></li>
            </ul>
        </li>
    </ul> --}}
</nav>

<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Utama</div>
                    <a class="nav-link" href="{{ route('home') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Kelola Konten</div>
                    <a class="nav-link" href="{{ route('billboard') }}">
                        <div class="sb-nav-link-icon"><i class="far fa-image"></i></div>
                        Billboard
                    </a>
                    <a class="nav-link" href="{{ route('jpo') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-water"></i></div>
                        JPO
                    </a>
                    <a class="nav-link" href="{{ route('led') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-chalkboard"></i></div>
                        LED
                    </a>
                    <a class="nav-link" href="{{ route('proyek') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-project-diagram"></i></div>
                        Proyek
                    </a>
                </div>
            </div>
            @if (Auth::check())
                <div class="sb-sidenav-footer">
                    <div class="small">Masuk sebagai :</div>
                    {{ auth()->user()->email }}
                </div>
            @endif
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($message = Session::get('warning'))
                <div class="alert alert-warning" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @endif
            @if ($errors->any() || ($message = Session::get('error')))
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        <li>{{ $message }}</li>
                    </ul>
                </div>
            @endif
            @yield('content')
        </main>
        @include('layouts.footer')
    </div>
</div>
