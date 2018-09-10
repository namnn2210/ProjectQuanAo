<?php

namespace App\Http\Controllers;

use App\Account;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function postLogin(Request $request)
    {
//        return dd($request);
        $request->validate([
            'username' => 'required|min:6|max:20',
            'password' => 'required|min:6|max:20'
        ], [
            'username.required' => 'Bạn phải nhập tên đăng nhập',
            'password.required' => 'Bạn phải nhập tên mật khẩu',
            'username.min' => 'Tên đăng nhập từ 6-20 ký tự',
            'username.max' => 'Tên đăng nhập từ 6-20 ký tự',
            'password.min' => 'Mật khẩu từ 6-20 ký tự',
            'password.max' => 'Mật khẩu từ 6-20 ký tự'
        ]);

        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect('/admin');
        } else {
            return redirect()->back()->with('message', 'Tên đăng nhập hoặc mật khẩu không đúng');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }

    public function registerAdmin(Request $request)
    {
        return view('admin.register');
    }

    public function createAdminAccount(Request $request)
    {
        $request->validate([
            'username' => 'required|min:6|max:20',
            'password' => 'required|min:6|max:20',
            'email' => 'required|email',
            'confirm-password' => 'required|min:6|max:20|same:password',
            'full_name' => 'required|min:2',
            'address' => 'required|min:5',
            'DOB' => 'required',
            'phone' => 'required|min:10|max:11'
        ], [
            'username.required' => 'Bạn phải nhập tên đăng nhập',
            'password.required' => 'Bạn phải nhập tên mật khẩu',
            'confirm-password.required' => 'Bạn phải nhập tên mật khẩu',
            'email.required' => 'Bạn phải nhập email',
            'full_name.required' => 'Bạn phải nhập tên đầy đủ của bạn',
            'address.required' =>'Bạn phải nhập địa chỉ',
            'DOB' => 'Bạn phải nhập ngày tháng năm sinh',
            'phone' => 'Bạn phải nhập số điện thoại',
            'username.min' => 'Tên đăng nhập từ 6-20 ký tự',
            'username.max' => 'Tên đăng nhập từ 6-20 ký tự',
            'password.min' => 'Mật khẩu từ 6-20 ký tự',
            'password.max' => 'Mật khẩu từ 6-20 ký tự',
            'confirm-password.min' => 'Mật khẩu từ 6-20 ký tự',
            'confirm-password.max' => 'Mật khẩu từ 6-20 ký tự',
            'confirm-password.same' => 'Mật khẩu xác nhận phải giống với mật khẩu đã nhập',
            'email.email' => 'Email không đúng định dạng',
            'full_name.min' => 'Tên phải có trên 4 kí tự',
            'address.min' => 'Địa chỉ phải từ 5 ký tự trở lên',
            'phone.min' => 'Số điện thoại có 10 hoặc 11 chữ số',
            'phone.max' => 'Số điện thoại có 10 hoặc 11 chữ số'

        ]);

        if ($this->isExistUsername(Input::get('username'))) {
            return redirect()->back()->with('message', 'Đăng ký không thành công, tên tài khoản đã tồn tại');
        }
        if ($this->isExistEmail(Input::get('email'))) {
            return redirect()->back()->with('message', 'Đăng ký không thành công, email đã tồn tại');
        }

        $obj = new User();
        $obj->username = Input::get('username');
        $obj->password = hash::make(Input::get('password'));
        $obj->full_name = Input::get('full_name');
        $obj->email = Input::get('email');
        $obj->address = Input::get('address');
        $obj->gender = str_replace('option','',Input::get('gender'));
        $obj->phone = Input::get('phone');
        $obj->DOB = Input::get('DOB');
        $obj->role = 1;
        $obj->status = 0;
        $obj->save();
        return redirect()->back()->with('message', 'Đăng ký thành công');
    }

    public static function isExistEmail($email)
    {
        $obj = User::where('email', '=', $email)->first();
        if ($obj != null) {
            return true;
        } else return false;
    }

    public static function isExistUsername($username)
    {
        $obj = User::where('email', '=', $username)->first();
        if ($obj != null) {
            return true;
        } else return false;
    }

}
