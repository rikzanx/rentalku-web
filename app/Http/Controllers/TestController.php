<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Kendaraan;
use App\Models\Pengemudi;

class TestController extends Controller
{
    public function test(){
        $mobil = 1;
        $pemilik = Kendaraan::with('user')->get()
                    ->where('id',$mobil);
        $pemilik=$pemilik[0]->user->id;
        $team = Pengemudi::with('user','team','roleTipe')->get()
            ->where('user_id',$pemilik)
            ->where('role_tipe_id',$pemilik);
        $team = $team[0]->team_id;
        $anggota = Pengemudi::with('user','team','roleTipe')->get()
        ->where('role_tipe_id','2')
        ->where('team_id',$team);
    	return response()
            ->json($anggota);
    }
}
