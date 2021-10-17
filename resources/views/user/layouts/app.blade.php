<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
    <!--load all Font Awesome styles -->
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
    @yield('css')
    @yield('js')
    <!-- Styles -->
    
</head>

<body style="background-image:url({{url('image/v996-009.png')}})">
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" style="width:150px;" href="{{ url('/dashboard') }}">
                    <img src="{{ asset('image/logo_gabung.png') }}" alt="" class="img-fluid">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link nav-left active" href="">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-left" href="">PesananKu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-left" href="">DompetKu</a>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('user.login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.login') }}">{{ __('Masuk') }}</a>
                                </li>
                            @endif

                            @if (Route::has('user.register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.register') }}">{{ __('Daftar') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa-solid fa-user"></i>Halo, {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="">Data Diri</a>
                                    <a class="dropdown-item" href="">Jadi pemilik mobil</a>
                                    <a class="dropdown-item" href="{{ route('user.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('user.logout') }}" method="GET" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

    @yield('content')    
    
    <div id="footer">
        <div class="row col-12 pt-4">
            <p class="mx-auto">All Right Reserved &copy; 2021. RentalKu Team.</p>
        </div>
    </div>
    
</body>
</html>