<?php
/**
 * Created by PhpStorm.
 * User: Ngo Ngoc Nam
 * Date: 8/27/2018
 * Time: 2:01 PM
 */

namespace App\Http\Controllers;


use App\Order;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController
{
    public function showAdminPage() {
        $count = count(Order::all()->where('created_at','<=',Carbon::now())->where('created_at','>=',Carbon::yesterday()));
        return view('admin.dashboard')->with('count',$count);
    }

    public function showNewOrder() {
        $start_date = Carbon::now();
        $end_date = Carbon::yesterday();
        $orders = Order::all()->where('created_at','<=',Carbon::now())->where('created_at','>=',Carbon::yesterday());
        return view('admin.order.new_order')->with('orders',$orders);
    }

    public function getChartDataApi()
    {
        $start_date = '2018-08-20';
        $end_date = '2018-08-25';
        $chart_data = Order::select(DB::raw('sum(total_price) as revenue'), DB::raw('date(created_at) as day'))
            ->whereBetween('created_at', array($start_date, $end_date))
            ->groupBy('day')
            ->orderBy('day', 'desc')
            ->get();
        return $chart_data;
    }
}