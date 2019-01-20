<?php

namespace App\Http\Controllers;

use App\Post;

/**
 * Class FilterController
 * @package App\Http\Controllers
 */
class FilterController extends Controller
{
    /**
     * @param $tag
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tagPage($tag)
    {
        $posts = Post::withAnyTag($tag)->paginate(3);

        return view('welcome', compact('posts'));
    }

}
