<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewUser extends Model
{
    use HasFactory;

    protected $fillable = [

    ];

    public function ratingUser(){
        return $this->hasMany('App\Models\RatingUser');
    }
}
