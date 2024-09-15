<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    # A post belongs to a user
    # To get the owner of the post
    public function user(){
        return $this->belongsTo(User::class);
    }


    # To get all the categories of a post
    public function categoryPost(){
        return $this->hasMany(CategoryPost::class);
    }

    # Post has many comments
    # To get all the comments of a post
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
