<?php

namespace App\Http\Controllers;

use App\Account;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    public function login(){
        return view('admin.login');
    }

    public function postLogin(Request $request){
//        return dd($request);
        $request->validate([
            'username' => 'required|min:8|max:20',
            'password' => 'required|min:6|max:20'
        ],[
            'username.required' && 'password.required' => 'You have to Enter username and password',
            'username.min' && 'username.max' && 'password.min' && 'password.max' => 'Username must have 8-20 character, Password must have 6-20 character'
        ]);
    }

}
