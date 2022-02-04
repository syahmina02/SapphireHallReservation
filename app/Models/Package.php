<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Hall;

class Package extends Model
{
    use HasFactory;
    protected $fillable = ['name', 
                           'price', 
                           'pax',
                           'service',];

    public function hall(){
        return $this->hasMany(Hall::class);
    }

    public function setServiceAttribute($value)
    {
        $this->attributes['service'] = json_encode($value);
    }

    public function getServiceAttribute($value)
    {
        return $this->attributes['service'] = json_decode($value);
    }
}
