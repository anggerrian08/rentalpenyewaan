<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    
    protected $fillable = ['plat'];

    public function car(){
        return $this->hasOne(Car::class);
    }
}
