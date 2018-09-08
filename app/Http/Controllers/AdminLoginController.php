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
            return redirect('/admin/product');
        }
        else {return redirect()->back()->with('message', 'Tên đăng nhập hoặc mật khẩu không đúng');}
    }

    public function logout(){
        Auth::logout();
        return redirect('/admin/login');
    }

    public function registerAdmin(Request $request){
        return view('admin.register');
    }

    public function createAdminAccount(Request $request){
        $request->validate([
            'username' => 'required|min:6|max:20',
            'password' => 'required|min:6|max:20',
            'email' => 'required|email',
            'confirm-password' => 'required|min:6|max:20|same:password',
            'fullname' =>'required|min:4'
        ],[
            'username.required' => 'Bạn phải nhập tên đăng nhập',
            'password.required' => 'Bạn phải nhập tên mật khẩu',
            'confirm-password.required' => 'Bạn phải nhập tên mật khẩu',
            'email.required' => 'Bạn phải nhập email',
            'fullname.required' => 'Bạn phải nhập tên đầy đủ của bạn',
            'username.min' => 'Tên đăng nhập từ 6-20 ký tự',
            'username.max' => 'Tên đăng nhập từ 6-20 ký tự',
            'password.min' => 'Mật khẩu từ 6-20 ký tự',
            'password.max' => 'Mật khẩu từ 6-20 ký tự',
            'confirm-password.min' => 'Mật khẩu từ 6-20 ký tự',
            'confirm-password.max' => 'Mật khẩu từ 6-20 ký tự',
            'confirm-password.same' => 'Mật khẩu xác nhận phải giống với mật khẩu đã nhập',
            'email.email' => 'Email không đúng định dạng',
            'fullname.min' => 'Tên phải có trên 4 kí tự'
        ]);

//        return redirect('/admin/login')->with('message','Đăng ký thành công, xin mời đăng nhập');
        return redirect()->back()->with('message','Đăng ký không thành công');
    }

}
