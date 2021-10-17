<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <!-- <script src="{{ asset('js/user/login.js') }}" defer></script> -->

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">

        <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/user/register.css') }}" rel="stylesheet">
    </head>
    <body>
        <img src="{{ asset('image/rectangle205.png') }}" alt="" class="img-fluid img-background">
            <div class="login-form col-8">
                <div class="row">
                <div class="col-6">
                    <img src="{{ asset('image/logo_gabung.png') }}" alt="" class="img-logo mt-2 mx-auto d-block img-fluid">
                    <p class="text-center mt-5 mb-0"><b>Daftar Pengguna Baru</b></p>
                    <p class="small text-center">Silakan isi form disamping ini untuk pendaftaran akun RentalKu Anda!</p>
                </div>
                <div class="col-6 pt-4">
                <form action="" class="mx-3">
                    <label class="small">Nama lengkap anda</label>
                    <input class="col-12" type="text" name="" id="" placeholder="muhammad">
                    <label class="small">Email anda</label>
                    <input class="col-12" type="email" name="" id="" placeholder="example@gmail.com">
                    <label class="small">Password anda</label>
                    <input class="col-12" type="password" name="" id="" placeholder="******">
                    <label class="small">Ketik ulang password anda</label>
                    <input class="col-12" type="password" name="" id="" placeholder="******">

                    <input class="my-4 col-12 login-btn" type="submit" value="Daftar">
                </form>
                <p class="text-center small"><b><i>Sudah punya akun? <a href="{{ route('user.login') }}">Login</a></i></b></p>
                </div>
                </div>
                
            </div>
        <div class="footer">
            <p>All Right Reserved &copy; 2021. RentalKu Team.</p>
        </div>
    </body>
</html>