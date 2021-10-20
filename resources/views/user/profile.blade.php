@extends('user.layouts.app')

@section('css')
    <link href="{{ asset('css/user/profile.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div id="head">
        <div class="head-box">
            <img src="{{ asset('image/rectangle205.png') }}" class="img-fluid img-rectangle" alt="">
            
            <!-- <img src="{{ asset('image/mobil-round.png') }}" alt="" class="mobil img-fluid mx-auto d-block"> -->
        </div>
    </div>
    <div id="profile">
        <div class="profile-outer w-100">
        <div class="background-box mx-auto col-6">
                <img src="{{ asset('image/city.png') }}" alt="" class="img-fluid img-city w-100">
            </div>
            <div class="profile-box mx-auto col-6 p-4">
                    
                    <div class="image-outer">
                        <div class="image-box d-inline-block">
                            <img src="{{ asset('image/profil.png') }}" class="rounded-circle foto-profile">
                            <form action="" class="">
                                <input type="file" name="" id="" class="d-none">
                                <button class="button btn-camera"><i class="fa-solid fa-camera color-base"></i></button>
                            </form>
                        </div>
                    </div>
                    
                <p class="text-center mt-5 mb-0"><b>Muhammad</b></p>
                <p class="text-center">12 September 2000</p>
                <div class="row col-12">
                    <div class="col-6 offset-3">
                        <label for="" class="mb-0">Nama</label>
                        <input type="text" name="" id="" class="d-block w-100 input-style px-2 py-3">
                    </div>
                    <div class="col-6 offset-3">
                        <label for="" class="mb-0">Tanggal Lahir</label>
                        <input type="text" name="" id="" class="d-block w-100 input-style px-2 py-3">
                    </div>
                    <div class="col-6 offset-3">
                        <label for="" class="mb-0">No Telepon</label>
                        <input type="text" name="" id="" class="d-block w-100 input-style px-2 py-3">
                    </div>
                    <div class="col-6 offset-3">
                        <label for="" class="mb-0">Alamat</label>
                        <input type="text" name="" id="" class="d-block w-100 input-style px-2 py-3">
                    </div>
                    <div class="col-6 offset-3">
                        <label for="" class="mb-0">Email</label>
                        <input type="text" name="" id="" class="d-block w-100 input-style px-2 py-3">
                    </div>
                    <div class="col-6 offset-3">
                        <label for="" class="mb-0">Password</label>
                        <input type="text" name="" id="" class="d-block w-100 input-style px-2 py-3">
                    </div>
                    <div class="col-6 offset-3 mt-4">
                        <input type="submit" name="" id="" class="d-block w-100 button-style px-2 py-2" value="Simpan" class="button-style">
                    </div>
                </div>
            </div>
            
        </div>
    </div>
@endsection
