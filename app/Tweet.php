<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tweet extends Model
{
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function like(User $user = null, $liked = true) {
        return $this->likes()->updateOrCreate(
            [
                'user_id' => $user ? $user->id : auth()->id(),
            ],
            [
                'liked' => $liked
            ]
        );
    }

    public function dislike(User $user = null) {
       return $this->like($user, false);
    }

    public function isLikedBy(User $user) {
        return $this->likes()
            ->where('user_id', $user->id)
            ->where('liked', true)
            ->count();
    }

    public function isDislikedBy(User $user) {
        return $this->likes()
            ->where('user_id', $user->id)
            ->where('liked', false)
            ->count();
    }

    public function scopeWithLikes(Builder $query) {
        $query->leftJoinSub(
            'SELECT tweet_id, SUM(liked) likes, sum(!liked) dislikes FROM likes GROUP BY tweet_id',
            'likes',
            'likes.tweet_id',
            'tweets.id'
        );
    }
}
