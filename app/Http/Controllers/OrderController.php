<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

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

        if (Auth::check()) {
            $obj = Order::all();
            return view('admin.order.list')
                ->with('obj', $obj);
        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        if (Auth::check()) {
        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');
    }

    /**
     * Store a newly created resource in storage.
     *

     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        if (Auth::check()) {
        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');
    }

    /**
     * Display the specified resource.
     *

     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        if (Auth::check()) {
        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if (Auth::check()) {
        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');
    }

    public function search() {
        if (Auth::check()) {
            $start_date = Input::get('startDate');
            $end_date = Input::get('endDate');
            if($start_date != null && $end_date != null) {
                $orders = DB::table('orders')->whereBetween('created_at', [$start_date, $end_date])->get();
                $order_details = OrderDetail::all();
                $products = Product::where('status',1)->get();
                return response()->json(['orders' => $orders , 'order_details' => $order_details, 'products' => $products], 200);
            }
            else {
                $orders = Order::all();
                $order_details = OrderDetail::all();
                $products = Product::where('status',1)->get();
                return response()->json(['orders' => $orders , 'order_details' => $order_details, 'products' => $products], 200);
            }
        }
        else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        if (Auth::check()) {
        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');
    }

    /**
     * Remove the specified resource from storage.
     *

     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (Auth::check()) {
            $obj = Order::find($id);
            if ($obj == null) {
                return view('404');
            }
            $obj->delete();
        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');
    }

    public function changeStatus()
    {
        if (Auth::check()) {
            $id = Input::get('id');
            $status = Input::get('status');
            $order = Order::find($id);
            if ($order == null) {
                return view('404');
            }
            $order->status = $status;
            $order->save();
            $order_id = $order -> id;
            return Response::json($order_id);
        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');
    }
}
