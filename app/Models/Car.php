<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = ['id'];

    public function merek(){
        return $this->belongsTo(Merek::class);
    }

    public function user(){
        return $this->belongsToMany(User::class, 'car_likes', 'car_id', 'user_id');
    }

    public function review(){
        return $this->hasMany(Review::class);
    }
}
