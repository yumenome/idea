<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Idea $idea){

        request()->validate([
            'content' =>'required'
        ]);

        $comment = new Comment();
        $comment->idea_id = $idea->id;
        $comment->user_id = auth()->id();
        $comment->content = request('content');
        $comment->save();

        return redirect()->route('idea.show', $idea->id)->with('success', 'Comment posted successfully');
    }
}