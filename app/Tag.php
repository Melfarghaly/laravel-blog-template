<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

		public function getRouteKeyName()
    {
        return 'name'; // Name is Sluggified by default, so no needto add a slug column
    }

		public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
    
}
