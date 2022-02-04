<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Package;
use App\Models\Image;

class Hall extends Model
{
    use HasFactory;
    protected $fillable = ['name', 
                           'price', 
                           'address1',
                           'address2',
                           'city',
                           'location',
                           'zip',
                           'package_id',
                           'description', 
                           'cover'];
    
    public function package(){
        return $this->belongsTo(Package::class);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }
}
