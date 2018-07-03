<?php

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

use App\Post;
use App\Tag;

// The Magazine Template
Route::get('/template', function () {
	return view('template.image-post');
});



// Main Route
Route::get('/about', function () {
    return view('page.about');
})->name('about');
Route::redirect('/about-us', '/about');

Route::get('/contact', function () {
    return view('page.contact');
})->name('contact');
Route::redirect('/contact-us', '/contact');

// Category, Archive, Posts


// Show all posts
Route::get('/', 'PostController@index');

// Will handle categories and tags
Route::get('/posts', 'PostController@archive');

// Creating a new post
Route::get('posts/create', 'PostController@create')->name('create-post');
// Store a post
Route::post('/posts', 'PostController@store');
// Display single Post
Route::get('/posts/{post}', 'PostController@show')->name('show-post');
// edit existing posts
Route::get('posts/{post}/edit', 'PostController@edit');
// update existing post
Route::patch('posts/{post}', 'PostController@update');
// delete a post
Route::delete('posts/{post}/delete', 'PostController@destroy');


// Comments
// Adding new comment
Route::get('/posts/{post}/comments', function (Post $post) {
	return view('blog.show',compact('post'));
});
Route::post('/posts/{post}/comments', 'CommentController@store');
Route::delete('/posts/{post}/comments/{comment}/delete', 'CommentController@destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// Tags
Route::get('/posts/tags/{tag}', 'TagController@index');










// Search
Route::get('/search', function(Request $request){
	// return "Searching...for...".request('search');

	$results = DB::select('select * from posts where title = ?', [request('search')]);

	return $results;

});
