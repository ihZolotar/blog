<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view("posts.create");
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|min:2',
            'alias' => 'required',
            'intro' => 'required',
            'body' => 'required',
            'tag' => 'required'
        ]);

        $input = $request->all();
        $tags = explode(",", $request->tag);
        $article = Post::create($input);
        $article->tag($tags);

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view("posts.edit", compact('post'));
    }

    public function update(Post $post)
    {
        $this->validate(request(), [
            'title' => 'required|min:2',
            'alias' => 'required',
            'intro' => 'required',
            'body' => 'required',
            'tag' => 'required'
        ]);
        $post->update(request(['title', 'alias', 'intro', 'body', 'tag']));
        return redirect('/');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/');
    }

}
