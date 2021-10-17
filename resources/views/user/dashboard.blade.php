@extends('user.layouts.app')

@section('css')
    <link href="{{ asset('css/user/dashboard.css') }}" rel="stylesheet">
@endsection

@section('content')
<div id="head">
        <div class="head-box">

            <img src="{{ asset('image/rectangle205.png') }}" class="img-fluid img-rectangle" alt="">
            <div class="search-box mx-auto d-block">
            <form action="" >
                <input class="py-2 px-4 cari-rental d-block" type="text" name="" id="" placeholder="Cari di rentalku">
                <button class="py-2 px-4 button"><i class="fa-solid fa-search"></i></button>
            </form>
            </div>
            <div class="text-px">
            <h2 class="text-white text-center text-head mt-4">
            Kami menawarkan Jasa Sewa Mobil Surabaya dan beberapa kota besar lainnya di Indonesia, dengan servis yang aman dan terpercaya bagi setiap orang, baik untuk keperluan bisnis, keluarga maupun liburan
            </h2>
            </div>
            
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
        </div>
    </div>

    <div id="mobil">
        <div class="container">
            <div class="row col-12">
                
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
@endsection
