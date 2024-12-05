<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function car(){
        return $this->belongsTo(Car::class);
    }
}
