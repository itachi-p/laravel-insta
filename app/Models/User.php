<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    # To get all the posts of a user
    public function posts()
    {
        return $this->hasMany(Post::class);
    }


    # One to Many
    # User has many followers
    # To get all the followers of a user but only IDs
    public function followers()
    {
        return $this->hasMany(Follow::class, 'following_id');
    }


    # One to Many
    # User has many following
    # To get all the following users but only IDs
    public function following()
    {
        return $this->hasMany(Follow::class, 'follower_id');
    }
}
