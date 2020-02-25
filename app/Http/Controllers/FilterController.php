<?php

namespace App\Http\Controllers;

use App\Post;

class FilterController extends Controller
{
    public function tagPage($tag)
    {
        $posts = Post::withAnyTag($tag)->paginate(3);

        return view('welcome', compact('posts'));
    }

}
