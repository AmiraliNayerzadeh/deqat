<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pishran\LaravelPersianSlug\HasPersianSlug;
use Spatie\Sluggable\SlugOptions;

class Location extends Model
{
    use HasPersianSlug;
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }


    protected $fillable = [
      'name',
      'logo',
      'cover',
      'map',
      'description',
      'map',
      'phone',
      'address',
      'phoneSec',
      'email',
      'instagram',
      'linkedin',
      'twitter',
      'web',
      'video',
      'user_id',
      'city_id',
      'city_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function gallery()
    {
        return $this->hasMany(LocationGallery::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }

}
