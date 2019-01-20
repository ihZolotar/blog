<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

/**
 * Class CommentController
 * @package App\Http\Controllers
 */
class CommentController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->body = $request->get('comment_body');
        $comment->user()->associate($request->user());
        $post = Post::find($request->get('post_id'));
        $post->comments()->save($comment);

        return back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function replyStore(Request $request)
    {
        $reply = new Comment();
        $reply->body = $request->get('comment_body');
        if (!empty($reply->body)) {
            $reply->user()->associate($request->user());
            $reply->parent_id = $request->get('comment_id');
            $post = Post::find($request->get('post_id'));

            $post->comments()->save($reply);
        }

        return back();
    }

    public function destroy(Comment $comment, $id)
    {
        $comment->findOrFail($id)->delete();

        return back();
    }
}
