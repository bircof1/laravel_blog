<?php

namespace App\Http\Controllers\Posts;

use App\Category;
use App\Comment;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\PostsRequest;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::with(['user','category'])->latest()->get();
        $categories=Category::all();
        // $categories=Category::select('id','name','slug')->get();
        // if(request('category')){
        //     $posts=Post::where('category_id',request('category'))->get();
        //     return view('blog.posts_Index',compact('posts','categories'));
        // }
        return view('blog.posts_Index',compact('posts','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('blog.posts_create',compact('post','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)
    {

        // $post=Post::create([
        //     'user_id'=>auth()->id(),
        //     'title'=>$request->title,
        //     'body'=>$request->body,
        // ]);

        auth()->user()->posts()->create($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post, Comment $comments)
    {
        // $post=Post::find($id);

        return view('blog.posts_Show',compact('post','comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // $post=Post::where('id',$id)->first();

        // if($post->user_id!=auth()->id()){
        //     abort(403,"Vous n'êtes pas autorisé sur cette page");
        // }
        $this->authorize('update',$post);
        $categories=Category::pluck('name','id');
        return view('blog.posts_edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update',$post);
        $post->update($request->all());
        return redirect()->route('posts.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('update',$post);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
