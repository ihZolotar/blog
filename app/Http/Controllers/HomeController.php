<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
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

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|min:2',
            'alias' => 'required',
            'intro' => 'required',
            'body' => 'required',
            'tag' => 'required',
            'user_id' => 'required'
        ]);

        $input = $request->all();
        $tags = explode(",", $request->tag);
        $article = Post::create($input);
        $article->tag($tags);

        return redirect('/');
    }

    /**
     * @param Post $post
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Post $post)
    {
        return view("posts.edit", compact('post'));
    }

    /**
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Post $post)
    {
        $this->validate(request(), [
            'title' => 'required|min:2',
            'alias' => 'required',
            'intro' => 'required',
            'body' => 'required',
            'tag' => 'required',
            'user_id' => 'required'
        ]);
        $post->update(request(['title', 'alias', 'intro', 'body', 'tag', 'user_id']));

        return redirect('/');
    }

    /**
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect('/');
    }

}
