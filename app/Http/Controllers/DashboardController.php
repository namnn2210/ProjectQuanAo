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
use App\Product;
use App\Subscribed;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class DashboardController
{
    public function showAdminPage()
    {
        if (Auth::check()) {
            return view('admin.dashboard');
        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');
    }

    public function getCountNewOrderApi()
    {
        if (Auth::check()) {
            $count = count(Order::all()->where('created_at', '<=', Carbon::now())->where('created_at', '>=', Carbon::yesterday()));
            return Response::json($count);
        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');
    }

    public function getNewProduct()
    {
        if (Auth::check()) {
            $start_date = Input::get('startDate');
            $end_date = Input::get('endDate');
            if ($start_date != null && $end_date != null) {
                $count = count(Product::select(DB::raw('products.created_at'))
                    ->whereBetween('products.created_at', array($start_date . ' 00:00:00', $end_date . ' 23:59:59'))->get()
                );
                return Response::json($count);
            } else {
                $count = count(Product::all()->where('created_at', '<=', Carbon::now())->where('created_at', '>=', Carbon::yesterday()));
                return Response::json($count);
            }
        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');
    }


    public function showNewOrder()
    {
        if (Auth::check()) {
            $orders = Order::all()->where('created_at', '<=', Carbon::now())->where('created_at', '>=', Carbon::yesterday());
            return view('admin.order.new_order')->with('orders', $orders);
        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');
    }

    public function getCountSubscriber()
    {
        if (Auth::check()) {
            $start_date = Input::get('startDate');
            $end_date = Input::get('endDate');
            if ($start_date != null && $end_date != null) {
                $count = count(Subscribed::select(DB::raw('subscribeds.created_at'))
                    ->whereBetween('subscribeds.created_at', array($start_date . ' 00:00:00', $end_date . ' 23:59:59'))->get()
                );
                return Response::json($count);
            } else {
                $count = count(Subscribed::all()->where('created_at', '<=', Carbon::now())->where('created_at', '>=', Carbon::yesterday()));
                return Response::json($count);
            }
        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');
    }

    public function getTotalRevenue()
    {
        if (Auth::check()) {
            $start_date = Input::get('startDate');
            $end_date = Input::get('endDate');
            if ($start_date != null && $end_date != null) {
                $revenue = Order::select(DB::raw('sum(orders.total_price) as revenue'))
                    ->whereBetween('created_at', array($start_date . ' 00:00:00', $end_date . ' 23:59:59'))->get();
                return Response::json($revenue);
            } else {
                $revenue = Order::select(DB::raw('sum(orders.total_price) as revenue'))
                    ->whereMonth('created_at','=',Carbon::today()->month)->get();
                return response()->json($revenue, 200);
        }

        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');
    }

    public function getChartDataApi()
    {
        if (Auth::check()) {
            $start_date = Input::get('startDate');
            $end_date = Input::get('endDate');
            if ($start_date != null && $end_date != null) {
                $chart_data = Order::select(DB::raw('sum(total_price) as revenue'), DB::raw('date(created_at) as day'))
                    ->whereBetween('created_at', array($start_date . ' 00:00:00', $end_date . ' 23:59:59'))
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

    public function getPieChartDataApi()
    {
        if (Auth::check()) {
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
        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');
    }
}