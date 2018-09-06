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
// Recommended Posts
use App\RecommendedPost;


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

// Sending of mails on contact page form
Route::post('/contact', 'HomeController@contactmail');


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
Route::delete('posts/{post}', 'PostController@destroy');


// Comments
// Adding new comment
Route::get('/posts/{post}/comments', 'CommentController@show');
Route::post('/posts/{post}/comments', 'CommentController@store');
Route::delete('/posts/{post}/comments/{comment}/delete', 'CommentController@destroy');


Auth::routes();
Route::get('/dashboard', 'HomeController@index')->name('home');


// Tags
Route::get('/posts/tags/{tag}', 'TagController@index');



// Categories
// Show posts and select from differnt categories
Route::get('/category', 'CategoryController@index');
// Create new category
Route::get('/category/create', 'CategoryController@create');
Route::post('/category', 'CategoryController@store');
// Display a category and its posts
Route::get('/category/{category}', 'CategoryController@show');
Route::get('/category/{category}/edit', 'CategoryController@edit');
Route::patch('/category/{category}', 'CategoryController@update');
Route::delete('/category/{category}', 'CategoryController@delete');





// Recommended Posts
Route::get('/recommended/posts', 'RecommendedPostController@index');
Route::post('/recommended/posts/{post}', 'RecommendedPostController@store');
Route::get('/recommended/posts/{post}', function (Post $post) {
	return redirect("/posts/$post->slug");
});
Route::delete('/recommended/posts/{post}', 'RecommendedPostController@destroy');



// Profile
// Route::get('user/{user}/dashboard', 'ProfileController@index');
// Route::get('user/{user}/profile', 'ProfileController@show');
// Route::get('user/profile/create', 'ProfileController@create');
// Route::post('user/profile', 'ProfileController@store');
// Route::get('user/{user}/profile/edit', 'ProfileController@edit');
// Route::patch('user/profile', 'ProfileController@update');
// Route::delete('user/profile', 'ProfileController@delete');

// Admin Route
Route::get('admin', 'AdminController@index');

// User Management
Route::get('admin/users', 'AdminController@users');
Route::get('admin/users/add', 'AdminController@usersAdd');
Route::post('admin/users/add', 'AdminController@usersSave');
// Edit
// Route::patch('admin/users/{user}', 'AdminController@usersUpdate');
Route::delete('admin/users/{user}', 'AdminController@usersDelete');




// Search
Route::get('/search', function(Request $request){
	// return "Searching...for...".request('search');

	$results = DB::select('select * from posts where title = ?', [request('search')]);

	return $results;

});
