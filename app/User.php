<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAllTweets() {
        $follows = $this->follows()->pluck('id');

        return Tweet::whereIn('user_id', $follows)
                ->orWhere('user_id', $this->id)
                ->withLikes()
                ->latest()->get();
    }

    public function getSelfTweets() {
        return $this->hasMany(Tweet::class);
    }

    public function getAvatarAttribute($value)
    {
        if (isset($value)) {
            return asset('storage/' . $value);
        } else {
            return asset('storage/avatars/default-avatar.png');
        }
    }
}
