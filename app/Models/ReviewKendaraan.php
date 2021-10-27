<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewKendaraan extends Model
{
    use HasFactory;

    protected $fillable = [
        'rating_kendaaran_id',
        'review'
    ];

        
    public function ratingKendaaran(){
        return $this->hasOne('App\Models\RatingKendaraan','id','rating_kendaraan_id');
    }
}
