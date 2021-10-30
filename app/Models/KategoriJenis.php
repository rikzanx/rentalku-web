<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriJenis extends Model
{
    use HasFactory;

    protected $fillable = [
        "name"
    ];

    public function kendaraan(){
        return $this->hasMany('App\Models\Kendaraan');
    }
}