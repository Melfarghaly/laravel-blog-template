<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

		// protected $fillable = [
		//     'body', 'post_id'
		// ];

    //$comment->post;
    // a comment belongs to a post
    public function post(){
      return $this->belongsTo(Post::class);
    }
}
