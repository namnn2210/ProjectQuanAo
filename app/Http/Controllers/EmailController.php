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

    public function getContent(Request $request)
    {
        $mail_content = '<h4>Chào mừng đến với cửa hàng thời trang FarFetch</h4> <p>Cảm ơn bạn đã quan tâm đến cửa hàng của chúng tôi, </p> <p>Các sản phẩm mới ra mắt của chúng tôi:</p><ul><li>Giày Balenciaga : <a href="http://localhost:8000/product/20"> http://localhost:8000/product/20</a></li><li>Giày thể thao : <a href="http://localhost:8000/product/22"> http://localhost:8000/product/22</a></li></ul>';
        $mail_content.str_replace('<','&lt;',$mail_content);
        $mail_content.str_replace('>','&gt;',$mail_content);
        return view('admin.email.send_reicept')->with('content', $mail_content);
    }
}
