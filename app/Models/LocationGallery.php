<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocationGallery extends Model
{

    protected $fillable = ['location_id' , 'path'];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

}
