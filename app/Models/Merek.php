<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merek extends Model
{
    protected $guarded = ['id'];

    public function car(){
        return $this->hasMany(Car::class);
    }
}
