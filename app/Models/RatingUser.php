<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingUser extends Model
{
    use HasFactory;

    protected $fillable = [

    ];

    public function user(){
        return $this->hasOne('App\Models\User','id','user_id');
    }

    public function userTo(){
        return $this->hasOne('App\Models\User','id','user_to_id');
    }

    public function reviewUser(){
        return $this->hasOne('App\Models\ReviewUser','id','review_user_id');
    }

}
