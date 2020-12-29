<?php

namespace App\Http\Controllers\Auths;

use App\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Else_;
use App\Http\Controllers\Controller;

class LoginsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function create(){
        return view('blog_auth.login');
    }
    public function store(){
        //     if(auth()->attempt( ['name'=>request('name'), 'password'=>request('password')])){
        //         return redirect()->route('posts.index');
        //     }elseif(auth()->attempt( ['email'=>request('name'), 'password'=>request('password')])){
        //         return redirect()->route('posts.index');
        //     }
        //     return back();

        $user=User::where('name',request('name'))->orWhere('email',request('name'))->first();
            if($user){
                if(password_verify(request('password'),$user->password))
                {
                    if(request('remember')){
                        auth()->login($user,true);
                    }
                    auth()->login($user,false);
                    return redirect()->route('posts.index');
                }
            }
            return back();
    }
    public function logout(){
        auth()->logout();
        return back();
    }
}
