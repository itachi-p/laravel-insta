<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    # Comment belongs to a user
    # To get the owner/user info of the comment
    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }
}
