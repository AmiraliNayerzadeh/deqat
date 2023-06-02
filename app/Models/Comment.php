<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment' , 'star' , 'approved' , 'parent_id' , 'commentable_id' , 'commentable_type' , 'user_id'] ;

    public function user()
    {
        return $this->belongsTo(User::class) ;
    }

    public function location()
    {
        return $this->belongsTo(Location::class , 'commentable_id') ;
    }

}
