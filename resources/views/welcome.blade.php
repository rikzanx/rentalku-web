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
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">

    <!-- Styles -->
    <!--load all Font Awesome styles -->
    <link href="{{ asset('fontawesome/css/all.css') }}" rel="stylesheet" />
</head>

<body style="background-image:url({{url('image/v996-009.png')}})">
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" style="width:150px;" href="{{ url('/') }}">
                    <img src="{{ asset('image/logo_gabung.png') }}" alt="" class="img-fluid">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
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
                            <li class="nav-item">
                                    <a class="nav-link" href="{{ route('user.dashboard') }}">Dashboard</a>
                                </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fa-solid fa-user"></i>Halo, Muhammad
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('user.profile') }}">Data Diri</a>
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
    <div id="head">
        <div class="head-box">
            <img src="{{ asset('image/rectangle205.png') }}" class="img-fluid img-rectangle" alt="">
            <h1 class="text-white text-center text-head display-4">SEWA MOBIL DENGAN MUDAH DAN BERKUALITAS BERSAMA KAMI</h1>
            <img src="{{ asset('image/mobil-round.png') }}" alt="" class="mobil img-fluid mx-auto d-block">
        </div>
    </div>
    <div id="section-2">
        <div class="container">
            <div class="row col-12 mb-5">
                <div class="col-4">
                    <h4><b>Anda punya mobil nganggur?</b></h4>
                    <h4 class="">Segera daftarin aja di RentalKu!</h4>
                    <a href="" class="btn-daftar  d-inline-block px-5 py-2">Daftar Sekarang</a>
                </div>
                <div class="col-4 offset-4">
                    <h4 class="text-right"><b>Mau liburan keluarga
                    tapi nggak ada mobil?</b></h4>
                    <h4 class="text-right">Buruan rental sekarang juga!</h4>
                    <a href="" class="btn-rental float-right d-inline-block px-5 py-2">Rental Sekarang</a>
                </div>
            </div>
            <div class="row col-8 offset-2 mb-5 mt-5">
                <h4 class="text-center">Kami menawarkan Jasa Sewa Mobil Surabaya dan beberapa kota besar lainnya di Indonesia, dengan servis yang aman dan terpercaya bagi setiap orang, baik untuk keperluan bisnis, keluarga maupun liburan</h4>
            </div>
        </div>
    </div>

    <div id="artikel mb-2">
        <div class="container">
            <div class="row col-12 mb-2">
                <h1 class="mx-auto">Artikel</h1>
            </div>
            <div class="row col-12 mb-2">
                <div class="col-4">
                    <div class="box-border">
                        <div class="img-box">
                            <img src="{{ asset('image/landscape1.png') }}" alt="" class="h-100 w-100">
                        </div>
                        <div class="textbox p-2">
                        <label for="">otomotif</label>
                        <p><b>Enam Teknik Mencuci Mobil yang Benar, Jangan Asal!</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="box-border">
                    <div class="img-box">
                        <img src="{{ asset('image/landscape2.png') }}" alt="" class="h-100 w-100">
                    </div>
                    <div class="textbox p-2">
                    <label for="">Travel</label>
                    <p><b>Enam Teknik Mencuci Mobil yang Benar, Jangan Asal!</b></p>
                    </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="box-border">
                        <div class="img-box">
                            <img src="{{ asset('image/landscape1.png') }}" alt="" class="h-100 w-100">
                        </div>
                        <div class="textbox p-2">
                        <label for="">otomotif</label>
                        <p><b>Enam Teknik Mencuci Mobil yang Benar, Jangan Asal!</b></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row col-12">
                <p class="mx-auto"><i><a href="" class="selengkapnya">Lihat selengkapnya</a></i></p>
            </div>
        </div>
    </div>
    
    <div id="footer">
        <div class="row col-12 pt-4">
            <p class="mx-auto">All Right Reserved &copy; 2021. RentalKu Team.</p>
        </div>
    </div>
    
</body>
</html>
