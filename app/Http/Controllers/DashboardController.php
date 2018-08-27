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
        $start_date = Carbon::now();
        $end_date = Carbon::yesterday();
        $orders = DB::table('orders')->where('created_at','<=',$start_date)->where('created_at','>=',$end_date)->get();
        $count = count($orders);
        return view('admin.dashboard')->with('count',$count);
    }

    public function showNewOrder() {
        $start_date = Carbon::now();
        $end_date = Carbon::yesterday();
        $orders = DB::table('orders')->where('created_at','<=',$start_date)->where('created_at','>=',$end_date)->get();
        return view('admin.order.new_order')->with('orders',$orders);
    }
}