<?php

namespace App\Http\Controllers;

use App\RecommendedPost;
use Illuminate\Http\Request;

use App\Post;

class RecommendedPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
      $this->middleware('auth')->except(['index']);
    }


    public function index()
    {
        $recommendedposts = RecommendedPost::select('post_id')->get();
            
        $postarray = array();

        foreach ($recommendedposts as $recommendedpost) {
            array_push($postarray, $recommendedpost->post_id);
        }

        $postarray = implode(',', $postarray);

        $posts = Post::whereRaw("id in ($postarray)")->latest()->paginate(7);

        $editorsPick = Post::whereRaw("id in ($postarray)")->latest()->limit(4)->get();

        return view('blog.archive', compact('posts', 'editorsPick'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $post_id = $post->id;
        $user_id = auth()->user()->id;

        RecommendedPost::create([
            'post_id' => $post_id,
            'user_id' => $user_id
        ]);

        return redirect("/posts/$post->slug");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RecommendedPost  $recommendedPost
     * @return \Illuminate\Http\Response
     */
    public function show(RecommendedPost $recommendedPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RecommendedPost  $recommendedPost
     * @return \Illuminate\Http\Response
     */
    public function edit(RecommendedPost $recommendedPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RecommendedPost  $recommendedPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RecommendedPost $recommendedPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RecommendedPost  $recommendedPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecommendedPost $recommendedPost, Post $post)
    {
        // then delete the post
        $recommendedPost = RecommendedPost::where('post_id', $post->id);

        $recommendedPost->delete();

        return redirect("/posts/$post->slug");
    }
}
