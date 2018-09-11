<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //
    public function send(Request $request)
    {
        $data = array('title'=>'Xin chao vietnam', 'content'=>'Day la noi dung');
        Mail::send('email.send_reicept', $data, function($message) {
            $message->to('namngocngo22@gmail.com', 'Tutorials Point')->subject
            ('Laravel HTML Testing Mail');
            $message->from('farfetchmensfashion@gmail.com','Xuan Hung');
        });
        return 'Okie';
    }
}
