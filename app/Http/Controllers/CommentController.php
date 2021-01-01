<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Movie;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        request()->validate(
            [
                'comment_comment' => 'required',
            ]
        );

        $comment = new Comment;
        $comment->comment = $request->get('comment_comment');
        $comment->user()->associate($request->user());
        $movie = Movie::find($request->get('movie_id'));
        $movie->comments()->save($comment);

        return back();
    }

    public function replyStore(Request $request)
    {
        request()->validate(
            [
                'comment_comment' => 'required',
            ]
        );

        $reply = new Comment();
        $reply->comment = $request->get('comment_comment');
        $reply->user()->associate($request->user());
        $reply->parent_id = $request->get('comment_id');
        $movie = Movie::find($request->get('movie_id'));

        $movie->comments()->save($reply);

        return back();
    }
}
