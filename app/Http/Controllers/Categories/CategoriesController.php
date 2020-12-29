<?php

namespace App\Http\Controllers\Categories;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function create(){
        return view('blog.categories.category_create');
    }
    public function store(Request $request){
        $categorie= Category::create(['name'=>$request->name]);
        return redirect()->route('posts.index');
    }
    public function categoryPost($id){
        $category=Category::find($id);
        $posts=Post::where('category_id','=',$id)->get();
        return view('blog.categories.category_list',compact('category','posts'));
    }
    public function destroy(Category $category){
        // $category->posts()->delete();
        $category->delete();
        return back();
    }
}
