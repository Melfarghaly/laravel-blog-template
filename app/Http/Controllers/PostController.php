<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

// Aditional
use \App\Services\Slug;
use Illuminate\Support\Facades\DB;
use App\Tag;
use Illuminate\Support\Facades\Storage;
use App\Category;

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
        $latest = Post::latest()->limit(3)->get();

        return view('blog.index', compact('latest'));
    }

    public function archive()
    {
        $posts = Post::latest()->paginate(7);
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
        $categories = Category::all();

        return view('blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post, Slug $slug, Tag $tag)
    {

        $this->validate(request(), [
          'title'   => 'required|min:5|max:190|unique:posts,title',

          'content' => 'required|min:5',

          'tags'    => 'required|min:2',

          'image'   => 'image|nullable|image|mimes:jpg,jpeg,png,gif|max:1999',

          'category'=> 'required'
        ]);

        $post_tags = [];    // Array for the tag attachments

        $tags_i = strtolower(request('tags'));          // 
        $tags_i = explode(',', $tags_i);                // Converts tags string to array
        $tags_i = array_map('trim', $tags_i);           // Remove white spaces from individual elements
        $tags_i = array_unique($tags_i);                // Remove duplicate elements
        $tags_i = array_filter($tags_i, 'strlen');      // Remove Empty elements

        $tags_i = array_map(function ($var){
            return str_slug($var, '-');
        }, $tags_i);                                    // Sluggify the elements

        foreach ($tags_i as $tag_i)
        {
            // Check if it exists in Database   //
            $db_tag = Tag::where('name', $tag_i);

            if ($db_tag->count()) {
                //  If yes, Add to post_tags array
                array_push($post_tags, $tag_i);

            } else {
                // If no, create the new tag
                $new_tag = new Tag;
                $new_tag->name = $tag_i;
                $new_tag->save();
                // Add to post_tags array
                array_push($post_tags, $tag_i);
            }
        }
        // print_r($post_tags);



        // Upload and Store Image
        if ($request->hasFile('image')) {
          $uploaded_image       = $request->file('image');
          $uploaded_image_full  = $uploaded_image->getClientOriginalName();
          $uploaded_image_name  = pathinfo($uploaded_image_full, PATHINFO_FILENAME);
          $uploaded_image_ext   = $uploaded_image->getClientOriginalExtension();
          // Not Used
          // $uploaded_image_mime  = $uploaded_image->getClientMimeType();
          // $uploaded_image_size  = $uploaded_image->getClientSize();

          $file_name_stored     = $uploaded_image_name. '_' .time() . '.' . $uploaded_image_ext;
          $path                 = $request->file('image')->storeAs('public/posts', $file_name_stored);
          // return($path);

        } else {
          $file_name_stored = null;
        }



        $post = Post::create([
          'user_id'     => auth()->id(),
          'title'       => request('title'),
          'content'     => request('content'),
          'slug'        => $slug->createSlug($request->title),
          'image'       => $file_name_stored,
          'category_id' => request('category')

        ]);
        foreach ($post_tags as $post_tag) {
            $tag = Tag::where('name', $post_tag)->first();
            $post->tags()->attach($tag);
        }

        return redirect('/posts');        // redirecting to another url
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        // $post = Post::findOrFail($post->id);
        return view('blog.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

        if (!auth()->user()->can('edit all posts') && auth()->user()->id != $post->user->id) {
          // return "Permission denied";
          abort(401, "You dont have enough permissions to perform this action");
        }

        // $post = Post::findOrFail($post->id);
        $categories = Category::all();
        return view('blog.edit', compact('post', 'categories'));
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
          'title'   => 'required|min:5|max:190',
          'content' => 'required|min:5',
          'tags'    => 'required|min:2',
          'category'=> 'required'
        ]);

        $post_tags = [];    // Array for the tag attachments

        $tags_i = strtolower(request('tags'));          // Converts all text to lowercase
        $tags_i = explode(',', $tags_i);                // Converts tags string to array
        $tags_i = array_map('trim', $tags_i);           // Remove white spaces from individual elements
        $tags_i = array_unique($tags_i);                // Remove duplicate elements
        $tags_i = array_filter($tags_i, 'strlen');      // Remove Empty and Null elements
        
        $tags_i = array_map(function ($var){
            return str_slug($var, '-');
        }, $tags_i);                                    // Sluggify the elements

        foreach ($tags_i as $tag_i)
        {
            // Check if it exists in Database   //
            $db_tag = Tag::where('name', $tag_i);

            if ($db_tag->count()) {
                //  If yes, Add to post_tags array
                array_push($post_tags, $tag_i);

            } else {
                // If no, create the new tag
                $new_tag = new Tag;
                $new_tag->name = $tag_i;
                $slug->createSlug($request->title);
                $new_tag->save();
                // Add to post_tags array
                array_push($post_tags, $tag_i);
            }
        }



        // Upload and Store Image
        if ($request->hasFile('image')) {
          $uploaded_image       = $request->file('image');
          $uploaded_image_full  = $uploaded_image->getClientOriginalName();
          $uploaded_image_name  = pathinfo($uploaded_image_full, PATHINFO_FILENAME);
          $uploaded_image_ext   = $uploaded_image->getClientOriginalExtension();
          // Not Used
          // $uploaded_image_mime  = $uploaded_image->getClientMimeType();
          // $uploaded_image_size  = $uploaded_image->getClientSize();
          $file_name_stored     = $uploaded_image_name. '_' .time() . '.' . $uploaded_image_ext;
          $path                 = $request->file('image')->storeAs('public/posts', $file_name_stored);
        }


        $post = Post::findOrFail($post->id);
        $post->title    = request('title');
        $post->content  = request('content');

        $post->category_id = request('category');

        if ($post->slug != $request->slug) {
            $post->slug    = $slug->createSlug($request->slug, $post->id);
        }

        $post->tags()->detach();    // Detach all Tags first
        foreach ($post_tags as $post_tag) {
            $tag = Tag::where('name', $post_tag)->first();
            $post->tags()->attach($tag);
        }

        if ($request->hasFile('image')) {
          $post->image    = $file_name_stored;
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
        // Before deleting post //
        // delete image
        if ($post->image != null) {
          # delete image
          Storage::delete('public/posts/'.$post->image);
        }
        // detach tags
        $post->tags()->detach();
        // delete comments
        $post->comments()->delete();
        // then delete the post
        $post->delete();

        return redirect('/posts');
    }
}
