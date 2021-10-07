<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [

    ];

    public function pengemudi(){
        return $this->hasMany('App\Models\Pengemudi');
    }
}
