<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'level',
        'email',
        'password',
        'image_link',
        'alamat',
        'kota',
        'telp',
        'lat',
        'long'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function kendaraan(){
        return $this->hasMany('App\Models\Kendaraan');
    }

    public function Pengemudi(){
        return $this->belongsToMany('App\Models\Pengemudi');
    }

    public function transaksi(){
        return $this->hasMany('App\Models\Transaksi');
    }

    public function room(){
        return $this->hasMany('App\Models\ChatRoom');
    }

    public function roomTo(){
        return $this->hasMany('App\Models\ChatRoom');
    }

    public function message(){
        return $this->hasMany('App\Models\Message');
    }

    public function dompet(){
        return $this->hasMany('App\Models\Dompet');
    }

    public function deposit(){
        return $this->hasMany('App\Models\Deposit');
    }

    public function ratingKendaraan(){
        return $this->hasMany('App\Models\RatingKendaraan');
    }

    public function ratingUser(){
        return $this->hasMany('App\Models\RatingUser');
    }

    public function ratingUserTo(){
        return $this->hasMany('App\Models\RatingUser');
    }

}
