<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingKendaraan extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasOne('App\Models\User','id','user_id');
    }

    public function kendaraan(){
        return $this->hasOne('App\Models\Kendaraan','id','kendaraan_id');
    }

    public function reviewKendaraan(){
        return $this->hasOne('App\Models\ReviewKendaraan','id','review_kendaraan_id');
    }

    public function ratingKendaraan(){
        return $this->hasMany('App\Models\RatingKendaraan');
    }
}
