<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class PostTag extends Model
{
    protected $fillable = ['title', 'slug', 'status'];

    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'post_tag_id', 'id')
            ->where('status', 'active');
    }

    public static function getBlogByTag($slug)
    {
        return PostTag::with('posts')->where('slug', $slug)->first();
    }
}
