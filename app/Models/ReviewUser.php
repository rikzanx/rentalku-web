<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'rating_user_id',
        'review',
    ];

    public function ratingUser(){
        return $this->hasOne('App\Models\RatingUser','id','rating_user_id');
    }
}
