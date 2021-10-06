<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    
    public function user(){
        return $this->hasOne('App\Models\User','id','user_id');
    }

    public function kategori(){
        return $this->hasOne('App\Models\Kategori','id','kategori_id');
    }

    public function transaksi(){
        return $this->hasMany('App\Models\Transaksi');
    }

}
