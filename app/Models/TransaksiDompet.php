<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDompet extends Model
{
    use HasFactory;

    protected $fillable = [

    ];

    public function dompet(){
        return $this->hasOne('App\Models\Dompet','id','dompet+id');
    }
}
