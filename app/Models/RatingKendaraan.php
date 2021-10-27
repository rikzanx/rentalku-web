<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingKendaraan extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",
        "kendaraan_id",
        "jumlah_bintang"
    ];

    public function user(){
        return $this->hasOne('App\Models\User','id','user_id');
    }

    public function kendaraan(){
        return $this->hasOne('App\Models\Kendaraan','id','kendaraan_id');
    }
    public function reviewKendaaran(){
        return $this->hasMany('App\Models\ReviewKendaaran');
    }

}
