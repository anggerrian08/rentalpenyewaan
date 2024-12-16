<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promosi extends Model
{
    protected $table = 'promosis';
   protected $fillable =
   [
    'photo', 'start_date', 'end_date'
   ];
}
