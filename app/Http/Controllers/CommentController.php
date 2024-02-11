<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Idea $idea){
        $comment = new Comment();
        $comment->idea_id = $idea->id;
        $comment->user_id = auth()->id();
        $comment->content = request()->get('comment');
        $comment->save();

        return redirect()->route('ideas.index', $idea->id)->with('success', 'Comment Successfully created');
    }

    public function index(Idea $idea){

    }
}
