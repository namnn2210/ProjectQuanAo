<?php

namespace App\Http\Controllers;

use App\Subscribed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //
    public function send(Request $request)
    {
        $data = array('title'=>'Xin chao vietnam', 'content'=>'Day la noi dung');
        $subscribers = Subscribed::all();
        $email = [];
        $mail_content = Input::get('mail_content');
        foreach ($subscribers as $receiver) {
            $email.push($receiver->email);
        }
        Mail::send($mail_content, $data, function($message) use ($email) {
            $message->to($email)
                ->subject('Laravel HTML Testing Mail');
            $message->from('farfetchmensfashion@gmail.com','FarFetch Mens Fashion');
        });
        return response()->json(['success' => $mail_content],200);
    }
}
