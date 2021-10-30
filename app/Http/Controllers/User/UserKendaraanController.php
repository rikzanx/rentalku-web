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
}
