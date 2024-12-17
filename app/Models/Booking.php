<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function car(){
        return $this->belongsTo(Car::class);
    }
    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id');
    }
    public function detailPembayaran()
    {
        return $this->hasOne(DetailPembayaran::class, 'booking_id');
    }
}
