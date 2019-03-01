<?php

namespace App\Http\Controllers;

use App\Http\Middleware\RedirectIfAuthenticated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    //注册页面
    public function index(){
        return view('login.index');
    }
    //注册行为
    public function login(){

        //验证
        $this->validate(request(),[
            'email' => 'required|email',
            'password' => 'required|min:5|max:10',
            'is_remember'=>'integer'
        ]);

        //逻辑
        $user =\request(['email','password']);
        $is_remember=boolval(\request('is_remeber'));
        if(Auth::attempt($user,$is_remember)){
            return redirect('/posts');
        }

        //渲染
        return Redirect::back()->withErrors("邮箱密码不匹配");
    }
    //登出行为
    public function logout(){
        Auth::logout();
        return \redirect('/login');
    }
}
