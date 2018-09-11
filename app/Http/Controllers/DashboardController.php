<?php
/**
 * Created by PhpStorm.
 * User: Ngo Ngoc Nam
 * Date: 8/27/2018
 * Time: 2:01 PM
 */

namespace App\Http\Controllers;


use App\Order;
use App\OrderDetail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class DashboardController
{
    public function showAdminPage() {
        if (Auth::check()) {
            $count = count(Order::all()->where('created_at','<=',Carbon::now())->where('created_at','>=',Carbon::yesterday()));
            return view('admin.dashboard')->with('count',$count);
        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');

    }

    public function showNewOrder() {
        if (Auth::check()) {
            $start_date = Carbon::now();
            $end_date = Carbon::yesterday();
            $orders = Order::all()->where('created_at','<=',Carbon::now())->where('created_at','>=',Carbon::yesterday());
            return view('admin.order.new_order')->with('orders',$orders);
        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');

    }

    public function getChartDataApi()
    {
        if (Auth::check()) {
            $start_date = Input::get('startDate');
            $end_date = Input::get('endDate');
            if ($start_date != null && $end_date != null){
                $chart_data = Order::select(DB::raw('sum(total_price) as revenue'), DB::raw('date(created_at) as day'))
                    ->whereBetween('created_at', array($start_date.' 00:00:00', $end_date. ' 23:59:59'))
                    ->groupBy('day')
                    ->orderBy('day', 'desc')
                    ->get();
                return $chart_data;
            } else {
                $chart_data = Order::select(DB::raw('sum(total_price) as revenue'), DB::raw('date(created_at) as day'))
                    ->groupBy('day')
                    ->orderBy('day', 'desc')
                    ->get();
                return $chart_data;
            }

        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');
    }

    public function getPieChartDataApi() {
        if(Auth::check()) {
            $start_date = Input::get('startDate');
            $end_date = Input::get('endDate');
            if ($start_date != null && $end_date != null) {
                $chart_data = OrderDetail::select(DB::raw('categories.name as category'), DB::raw('sum(order_details.quantity) as quantity'))
                    ->join('products', 'order_details.product_id', '=', 'products.id')
                    ->join('categories', 'products.category_id', '=', 'categories.id')
                    ->join('orders', 'orders.id', '=', 'order_details.order_id')
                    ->whereBetween('orders.created_at', array($start_date . ' 00:00:00', $end_date . ' 23:59:59'))
                    ->groupBy('categories.name')
                    ->get();
                return $chart_data;
            } else {
                $chart_data = OrderDetail::select(DB::raw('categories.name as category'), DB::raw('sum(order_details.quantity) as quantity'))
                    ->join('products', 'order_details.product_id', '=', 'products.id')
                    ->join('categories', 'products.category_id', '=', 'categories.id')
                    ->join('orders', 'orders.id', '=', 'order_details.order_id')
                    ->groupBy('categories.name')
                    ->get();
                return $chart_data;
            }
        }
        else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');
    }
}