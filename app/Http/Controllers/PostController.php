<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

// Aditional
use \App\Services\Slug;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
      $this->middleware('auth')->except(['index', 'archive', 'show']);
    }

    public function index()
    {
        return view('blog.index');
    }

    public function archive()
    {

        $posts = Post::latest()->get();
        // $posts = Post::latest()->paginate(2);

        // $archives = Post::archives();

        return view('blog.archive', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $posts, Slug $slug)
    {

        $this->validate(request(), [
          'title' => 'required|min:5|max:190|unique:posts,title',

          'content' => 'required|min:5'
        ]);

        // Another Method of doing this is
        Post::create([
          'user_id' => auth()->id(),
          'title'   => request('title'),
          'content' => request('content'),
          'slug'    => $slug->createSlug($request->title),
        ]);

        // redirecting to another url
        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // dd($post);
        $post = Post::findOrFail($post->id);
        return view('blog.show',compact('post'));

        // dd(str_slug($post->title));
        // return Post::getRelatedSlugs('post-one');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $post = Post::findOrFail($post->id);
        return view('blog.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post, Slug $slug)
    {
        // Update the existing post//
        $this->validate(request(), [
          'title' => 'required|min:5|max:190',

          'content' => 'required|min:5'
        ]);

        $post = Post::findOrFail($post->id);
        $post->title    = request('title');
        $post->content  = request('content');

        if ($post->slug != $request->slug)
        {
            $post->slug    = $slug->createSlug($request->slug, $post->id);
            // 'slug'    => $slug->createSlug($request->title),
        }

        $post->save();

        // redirecting to another url
        return redirect('/posts/'.$post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post = Post::findOrFail($post->id);
        $post->delete();

        return redirect('/posts');
    }
}
