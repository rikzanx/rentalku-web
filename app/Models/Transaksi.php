<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasOne('App\Models\User','id','user_id');
    }
    
    public function kendaraan(){
        return $this->hasOne('App\Models\Kendaraan','id','kendaraan_id');
    }

    public function pengemudi(){
        return $this->hasOne('App\Models\Pengemudi','id','pengemudi_id');
    }
}
