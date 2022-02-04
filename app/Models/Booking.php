<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['date_booking', 
                           'time', 
                           'package_id',
                           'sessions',
                           'hall_id',
                           'notes',
                           'theme',
                            'user_id',
                            'status'];
}
