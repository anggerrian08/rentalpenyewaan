<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPembayaran extends Model
{
    protected $guarded= ['id'];


    public function booking(){
        return $this->belongsTo(Booking::class);
    }
    
}
