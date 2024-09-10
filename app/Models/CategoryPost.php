<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;
    protected $table = 'category_post';
    protected $fillable = ['category_id', 'post_id'];
    public $timestamps = false; // make the model aware that we do not need/want to use the timestamps


    # to get the name of the category
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
