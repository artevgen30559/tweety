<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfilesController extends Controller
{
    public function show(User $user) {
        return view('profiles.show', [
            'user' => $user,
            'tweets' => $user->getSelfTweets()->withLikes()->get()
        ]);
    }

    public function edit(User $user) {
        return view('profiles.edit', [
           'user' => $user
        ]);
    }

    public function logout() {
        Auth::logout();

        return redirect('/');
    }

    public function update(User $user) {
        $attributes = request()->validate([
            'name' => [
                'min:4',
                'max:30'
            ],
            'email' => [
                'email',
                'min:4',
                'max:30',
                Rule::unique('users')->ignore($user)
            ],
            'avatar' => [
                'image',
                'max:7000'
            ],
        ]);

        if (isset($attributes['avatar'])) {
            $attributes['avatar'] = request('avatar')->store('avatars');
        }

        $user->update($attributes);

        return redirect(route('profiles.show', $user));
    }
}
