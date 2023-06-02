<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pishran\LaravelPersianSlug\HasPersianSlug;
use Spatie\Sluggable\SlugOptions;

class City extends Model
{
    use HasPersianSlug;

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('nameEnglish')
            ->saveSlugsTo('slug');
    }

    protected $fillable = ['name' , 'nameEnglish' , 'image' , 'description'] ;

}
