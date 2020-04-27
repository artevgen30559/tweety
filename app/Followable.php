<?php


namespace app;


trait Followable
{
    public function follow(User $user) {
        $this->follows()->save($user);
    }

    public function unfollow(User $user) {
        $this->follows()->detach($user);
    }

    public function follows() {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_id');
    }

    public function isFollowing(User $user) {
        return $this->follows()->where('following_id', $user->id)->exists();
    }

    public function toggleFollow(User $user) {
        if ($this->isFollowing($user)) {
            return $this->unfollow($user);
        } else {
            return $this->follow($user);
        }
    }
}
