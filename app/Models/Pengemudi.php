<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengemudi extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasOne('App\Models\User','id','user_id');
    }

    public function team(){
        return $this->hasOne('App\Models\Team','id','team_id');
    }

    public function roleTipe(){
        return $this->hasOne('App\Models\RoleTipe','id','role_tipe_id');
    }
    public function transaksi(){
        return $this->hasMany('App\Models\Transaksi');
    }
}
