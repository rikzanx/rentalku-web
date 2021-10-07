<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $fillable = [

    ];

    public function user(){
        return $this->hasOne('App\Models\User','id','user_id');
    }

    public function dompet(){
        return $this->hasOne('App\Models\Dompet','id','dompet_id');
    }
}
