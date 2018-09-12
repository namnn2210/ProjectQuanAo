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
        }
    }
    public function showNewOrder()
    {
        if (Auth::check()) {
            $orders = Order::all()->where('created_at', '<=', Carbon::now())->where('created_at', '>=', Carbon::yesterday());
            return view('admin.order.new_order')->with('orders', $orders);
        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');
    }


    public function getTotalRevenue()
    {
        if (Auth::check()) {
            $start_date = Input::get('startDate');
            $end_date = Input::get('endDate');
            if ($start_date != null && $end_date != null) {
                $revenue = Order::select(DB::raw('sum(orders.total_price) as revenue'))
                    ->where('status',2)
                    ->whereBetween('created_at', array($start_date . ' 00:00:00', $end_date . ' 23:59:59'))->get();
                return Response::json($revenue);
            } else {
                $revenue = Order::select(DB::raw('sum(orders.total_price) as revenue'))
                    ->where('status',2)
                    ->whereMonth('created_at','=',Carbon::today()->month)->get();
                return Response::json($revenue);
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
                    ->where('status',2)
                    ->whereBetween('created_at', array($start_date . ' 00:00:00', $end_date . ' 23:59:59'))
                    ->groupBy('day')
                    ->orderBy('day', 'desc')
                    ->get();
                return $chart_data;
            } else {
                $chart_data = Order::select(DB::raw('sum(total_price) as revenue'), DB::raw('date(created_at) as day'))
                    ->where('status',2)
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
                    ->where('orders.status',2)
                    ->whereBetween('orders.created_at', array($start_date . ' 00:00:00', $end_date . ' 23:59:59'))
                    ->groupBy('categories.name')
                    ->get();
                return $chart_data;
            } else {
                $chart_data = OrderDetail::select(DB::raw('categories.name as category'), DB::raw('sum(order_details.quantity) as quantity'))
                    ->join('products', 'order_details.product_id', '=', 'products.id')
                    ->join('categories', 'products.category_id', '=', 'categories.id')
                    ->join('orders', 'orders.id', '=', 'order_details.order_id')
                    ->where('orders.status',2)
                    ->groupBy('categories.name')
                    ->get();
                return $chart_data;
            }
        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');
    }

    public function getColumnChartDataApi()
    {
        if (Auth::check()) {
            $start_date = Input::get('startDate');
            $end_date = Input::get('endDate');
            if ($start_date != null && $end_date != null) {
                $chart_data = Order::select(DB::raw('CASE
                WHEN TIME(orders.created_at) BETWEEN \'00:00:00\' AND \'01:00:00\' THEN \'00:00 - 01:00\'
                WHEN TIME(orders.created_at) BETWEEN \'01:00:00\' AND \'02:00:00\' THEN \'01:00 - 02:00\'
                WHEN TIME(orders.created_at) BETWEEN \'02:00:00\' AND \'03:00:00\' THEN \'02:00 - 03:00\'
                WHEN TIME(orders.created_at) BETWEEN \'03:00:00\' AND \'04:00:00\' THEN \'03:00 - 04:00\'
                WHEN TIME(orders.created_at) BETWEEN \'04:00:00\' AND \'05:00:00\' THEN \'04:00 - 05:00\'
                WHEN TIME(orders.created_at) BETWEEN \'05:00:00\' AND \'06:00:00\' THEN \'05:00 - 06:00\'
                WHEN TIME(orders.created_at) BETWEEN \'06:00:00\' AND \'07:00:00\' THEN \'06:00 - 07:00\'
                WHEN TIME(orders.created_at) BETWEEN \'07:00:00\' AND \'08:00:00\' THEN \'07:00 - 08:00\'
                WHEN TIME(orders.created_at) BETWEEN \'08:00:00\' AND \'09:00:00\' THEN \'08:00 - 09:00\'
                WHEN TIME(orders.created_at) BETWEEN \'09:00:00\' AND \'10:00:00\' THEN \'09:00 - 10:00\'
                WHEN TIME(orders.created_at) BETWEEN \'10:00:00\' AND \'11:00:00\' THEN \'10:00 - 11:00\'
                WHEN TIME(orders.created_at) BETWEEN \'11:00:00\' AND \'12:00:00\' THEN \'11:00 - 12:00\'
                WHEN TIME(orders.created_at) BETWEEN \'12:00:00\' AND \'13:00:00\' THEN \'12:00 - 13:00\'
                WHEN TIME(orders.created_at) BETWEEN \'13:00:00\' AND \'14:00:00\' THEN \'13:00 - 14:00\'
                WHEN TIME(orders.created_at) BETWEEN \'14:00:00\' AND \'15:00:00\' THEN \'14:00 - 15:00\'
                WHEN TIME(orders.created_at) BETWEEN \'15:00:00\' AND \'16:00:00\' THEN \'15:00 - 16:00\'
                WHEN TIME(orders.created_at) BETWEEN \'16:00:00\' AND \'17:00:00\' THEN \'16:00 - 17:00\'
                WHEN TIME(orders.created_at) BETWEEN \'17:00:00\' AND \'18:00:00\' THEN \'17:00 - 18:00\'
                WHEN TIME(orders.created_at) BETWEEN \'18:00:00\' AND \'19:00:00\' THEN \'18:00 - 19:00\'
                WHEN TIME(orders.created_at) BETWEEN \'19:00:00\' AND \'20:00:00\' THEN \'19:00 - 20:00\'
                WHEN TIME(orders.created_at) BETWEEN \'20:00:00\' AND \'21:00:00\' THEN \'20:00 - 21:00\'
                WHEN TIME(orders.created_at) BETWEEN \'21:00:00\' AND \'22:00:00\' THEN \'21:00 - 22:00\'
                WHEN TIME(orders.created_at) BETWEEN \'22:00:00\' AND \'23:00:00\' THEN \'22:00 - 23:00\'
                WHEN TIME(orders.created_at) BETWEEN \'23:00:00\' AND \'23:59:59\' THEN \'23:00 - 23:59\'
                END AS timeslot'), DB::raw('SUM(order_details.quantity) AS quantity'))
                    ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                    ->whereBetween('orders.created_at', array($start_date . ' 00:00:00', $end_date . ' 23:59:59'))
                    ->where('orders.status',2)
                    ->groupBy('timeslot')
                    ->orderBy('timeslot','asc')
                    ->get();
                return $chart_data;
            }
            else {
                $chart_data = Order::select(DB::raw('CASE
                WHEN TIME(orders.created_at) BETWEEN \'00:00:00\' AND \'01:00:00\' THEN \'00:00 - 01:00\'
                WHEN TIME(orders.created_at) BETWEEN \'01:00:00\' AND \'02:00:00\' THEN \'01:00 - 02:00\'
                WHEN TIME(orders.created_at) BETWEEN \'02:00:00\' AND \'03:00:00\' THEN \'02:00 - 03:00\'
                WHEN TIME(orders.created_at) BETWEEN \'03:00:00\' AND \'04:00:00\' THEN \'03:00 - 04:00\'
                WHEN TIME(orders.created_at) BETWEEN \'04:00:00\' AND \'05:00:00\' THEN \'04:00 - 05:00\'
                WHEN TIME(orders.created_at) BETWEEN \'05:00:00\' AND \'06:00:00\' THEN \'05:00 - 06:00\'
                WHEN TIME(orders.created_at) BETWEEN \'06:00:00\' AND \'07:00:00\' THEN \'06:00 - 07:00\'
                WHEN TIME(orders.created_at) BETWEEN \'07:00:00\' AND \'08:00:00\' THEN \'07:00 - 08:00\'
                WHEN TIME(orders.created_at) BETWEEN \'08:00:00\' AND \'09:00:00\' THEN \'08:00 - 09:00\'
                WHEN TIME(orders.created_at) BETWEEN \'09:00:00\' AND \'10:00:00\' THEN \'09:00 - 10:00\'
                WHEN TIME(orders.created_at) BETWEEN \'10:00:00\' AND \'11:00:00\' THEN \'10:00 - 11:00\'
                WHEN TIME(orders.created_at) BETWEEN \'11:00:00\' AND \'12:00:00\' THEN \'11:00 - 12:00\'
                WHEN TIME(orders.created_at) BETWEEN \'12:00:00\' AND \'13:00:00\' THEN \'12:00 - 13:00\'
                WHEN TIME(orders.created_at) BETWEEN \'13:00:00\' AND \'14:00:00\' THEN \'13:00 - 14:00\'
                WHEN TIME(orders.created_at) BETWEEN \'14:00:00\' AND \'15:00:00\' THEN \'14:00 - 15:00\'
                WHEN TIME(orders.created_at) BETWEEN \'15:00:00\' AND \'16:00:00\' THEN \'15:00 - 16:00\'
                WHEN TIME(orders.created_at) BETWEEN \'16:00:00\' AND \'17:00:00\' THEN \'16:00 - 17:00\'
                WHEN TIME(orders.created_at) BETWEEN \'17:00:00\' AND \'18:00:00\' THEN \'17:00 - 18:00\'
                WHEN TIME(orders.created_at) BETWEEN \'18:00:00\' AND \'19:00:00\' THEN \'18:00 - 19:00\'
                WHEN TIME(orders.created_at) BETWEEN \'19:00:00\' AND \'20:00:00\' THEN \'19:00 - 20:00\'
                WHEN TIME(orders.created_at) BETWEEN \'20:00:00\' AND \'21:00:00\' THEN \'20:00 - 21:00\'
                WHEN TIME(orders.created_at) BETWEEN \'21:00:00\' AND \'22:00:00\' THEN \'21:00 - 22:00\'
                WHEN TIME(orders.created_at) BETWEEN \'22:00:00\' AND \'23:00:00\' THEN \'22:00 - 23:00\'
                WHEN TIME(orders.created_at) BETWEEN \'23:00:00\' AND \'23:59:59\' THEN \'23:00 - 23:59\'
                END AS timeslot'), DB::raw('SUM(order_details.quantity) AS quantity'))
                    ->join('order_details', 'orders.id', '=', 'order_details.order_id')
                    ->where('orders.status',2)
                    ->groupBy('timeslot')
                    ->orderBy('timeslot','asc')
                    ->get();
                return $chart_data;
            }
        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');
    }
}