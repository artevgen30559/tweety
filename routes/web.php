<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::middleware('auth')->group(function() {
    Route::get('/', 'TweetsController@index');

    Route::get('/tweets', 'TweetsController@index')
        ->name('tweets.index');

    Route::post('/tweets/create-tweet', 'TweetsController@store')
        ->name('tweets.store');

    Route::get('/profiles/{user:name}', 'ProfilesController@show')
        ->name('profiles.show');

    Route::post('/profiles/{user:name}/follow', 'FollowsController@store')
        ->name('follows.store');

    Route::get('/profiles/{user:name}/edit', 'ProfilesController@edit')
        ->name('profiles.edit')->middleware('can:edit,user');

    Route::get('/logout', 'ProfilesController@logout')
        ->name('profiles.logout');

    Route::patch('/profiles/{user:name}/update', 'ProfilesController@update')
        ->name('profiles.update');

    Route::get('/explore', 'ExploreController@index')
        ->name('explore.index');

    Route::patch('/tweets/{tweet}/like', 'TweetsLikeController@store')
        ->name('tweets.like');

    Route::delete('/tweets/{tweet}/dislike', 'TweetsLikeController@destroy')
        ->name('tweets.dislike');
});

