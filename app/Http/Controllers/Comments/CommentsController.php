<?php

namespace App\Http\Controllers\Comments;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    public function store(Post $post){
        Comment::create([
            'user_id'=>auth()->id(),
            'post_id'=>$post->id,
            'body'=>request('body'),
        ]);
        return back();
    }
}
