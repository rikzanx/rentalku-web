<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kendaraan;

class UserKendaraanController extends Controller
{
    public function index(){

    }

    public function search(Request $request){
        $kendaraan = Kendaraan::paginate(5);
        return view('user.search',["kendaraan" => $kendaraan]);
    }

    public function detail($kendaraan_id){
        return view('user.detail-produk');
    }

    public function ulasan($kendaraan_id){
        return view('user.detail-produk-ulasan');
    }

    public function ulasan_pemilik($kendaraan_id){
        return view('user.detail-produk-ulasan-pemilik');
    }
}
