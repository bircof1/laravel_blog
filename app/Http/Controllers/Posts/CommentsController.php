<?php

namespace App\Http\Controllers\Posts;

use App\Comment;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Post $post){
        Comment::create([
            'user_id'=>auth()->id(),
            'post_id'=>$post,
            'body'=>request('body'),
        ]);
        return back();
        // $post->comments()->create(request()->all());
    }
}
