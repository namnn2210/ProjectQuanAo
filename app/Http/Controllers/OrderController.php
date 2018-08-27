<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $obj = Order::all();
        return view('admin.order.list')
            -> with('obj',$obj);
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $obj = Order::find($id);
        if ($obj == null) {
            return response()->json(['message' => 'Đơn hàng không tồn tại hoặc đã bị xoá!'], 404);
        }
        $obj->delete();
        return response()->json(['message' => 'Đã xoá thông tin đơn hàng'], 200);
    }

    public function changeStatus()
    {
        $id = Input::get('id');
        $status = Input::get('status');
        $order = Order::find($id);
        if ($order == null) {
            return view('404');
        }
        $order->status = $status;
        $order->save();
        return redirect('/admin/order');
    }
}
