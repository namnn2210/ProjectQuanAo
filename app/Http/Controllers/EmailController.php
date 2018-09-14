<?php

namespace App\Http\Controllers;

use App\Subscribed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;

class EmailController extends Controller
{
    //
    public function send(Request $request)
    {
        $data = array('title' => 'Xin chao vietnam', 'content' => 'Day la noi dung');
        Mail::send('admin.email.send_reicept', $data, function ($message) {
            $message->to('namngocngo22@gmail.com', 'ngo ngoc nam')
                ->subject('Laravel HTML Testing Mail');
            $message->from('farfetchmensfashion@gmail.com', 'FarFetch Mens Fashion');
        });
        return 'okie';
    }

    public function send2(Request $request)
    {
        $email = $request->input('email');
        $mail_content = $request->input('mail_content');
        $data = array('title' => 'Quảng cáo', 'content' => $mail_content);
        Mail::send('admin.email.send_reicept', $data, function ($message) use ($email) {
            $message->to($email, 'Tutorials Point')->subject
            ('Laravel HTML Testing Mail');
            $message->from('farfetchmensfashion@gmail.com', 'FarFetch');
        });
        return response()->json(['msg', 'DONE'], 200);
    }

    public function getContent()
    {
        $mail_content = '&lt;h1&gt; Hello &lt;/h1&gt;';

        return view('admin.email.send_reicept')->with('content', $mail_content);
    }
}
