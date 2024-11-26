<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['category_id', 'plat_id', 'name', 'description', 'price', 'stock', 'photo'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function plat(){
        return $this->belongsTo(Plat::class, 'plat_id');
    }
}
