<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pishran\LaravelPersianSlug\HasPersianSlug;
use Spatie\Sluggable\SlugOptions;

class Category extends Model
{
    use HasPersianSlug;

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    protected $fillable = ['name' , 'icon' , 'description' , 'parent' , 'slug',  'cover'] ;


    public function child()
    {
        return $this->hasMany(Category::class , 'parent' , 'id');
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class) ;
    }


}
