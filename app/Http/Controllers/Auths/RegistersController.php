<?php

namespace App\Http\Controllers\Auths;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistersController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function create(){
        return view('blog_auth.register');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|min:3|alpha_dash|unique:users,name',
            'email'=>'required|email|confirmed|unique:users,name',
            'password'=>'required|min:6|confirmed',
        ]);
        // User::create([
        //     'name'=>$request->name,
        //     'slug'=>$request->name,
        //     'email'=>$request->email,
        //     'password'=>bcrypt($request->password),
        // ]);
        User::create($request->all());
        return back();
    }
}
