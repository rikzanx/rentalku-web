<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserKendaraanController extends Controller
{
    public function index(){

    }

    public function search(Request $request){
        dd($request->pilihanKota);
        return view('user.search');
    }
}
