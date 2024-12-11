<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = ['id'];

    public function merek(){
        return $this->belongsTo(Merek::class);
    }

    public function carlikes(){
        return $this->belongsToMany(CarLikes::class);
    }

    public function review(){
        return $this->hasMany(Review::class);
    }

    public function booking(){
        return $this->hasMany(Booking::class);
    }
}
