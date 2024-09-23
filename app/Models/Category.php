<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

      // categoryは複数のpostを持つ
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
