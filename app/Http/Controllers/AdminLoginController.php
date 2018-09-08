<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function postLogin(Request $request){
//        return dd($request);
        $request->validate([
            'username' => 'required|min:6|max:20',
            'password' => 'required|min:6|max:20'
        ],[
            'username.required' => 'Bạn phải nhập tên đăng nhập',
            'password.required' => 'Bạn phải nhập tên mật khẩu',
            'username.min' => 'Tên đăng nhập từ 6-20 ký tự',
            'username.max' => 'Tên đăng nhập từ 6-20 ký tự',
            'password.min' => 'Mật khẩu từ 6-20 ký tự',
            'password.max' => 'Mật khẩu từ 6-20 ký tự'
        ]);

        if(Auth::attempt(['username'=>$request->username, 'password'=>$request->password])){
            return redirect('/admin');
        }
        else {return redirect()->back()->with('message', 'Tên đăng nhập hoặc mật khẩu không đúng');}
    }

    public function logout(){
        Auth::logout();
        return redirect('/admin/login');
    }



}
