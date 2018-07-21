<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user()->email;
});

Route::get('posts', function () {
		return App\Post::with('category', 'tags', 'user')->latest()->get();
});

Route::get('users', function () {
		return App\User::with('roles:name')->get();
});

Route::get('category', function () {
		return App\Category::with('posts')->get();
});
