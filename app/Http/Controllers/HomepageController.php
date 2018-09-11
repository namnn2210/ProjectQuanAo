<?php
/**
 * Created by PhpStorm.
 * User: Ngo Ngoc Nam
 * Date: 8/23/2018
 * Time: 2:47 PM
 */

namespace App\Http\Controllers;


use App\Category;
use App\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    public function showHomepage() {
        $obj_category = Category::where('status',1)->get();
        $ao_khoac = Category::where('id', 1)->first();
        $ao_phong = Category::where('id',2)->first();
        $giay = Category::where('id',5)->first();
        $balo = Category::where('id',4)->first();
        $phu_kien = Category::where('id',6)->first();
        $obj = Product::where('status' ,1)
            ->where('discount','>', 0)
//            ->where( DB::raw("NOW() - `created_at`") ,'<', 7)
            ->whereRaw('CURRENT_DATE - DATE(created_at) < 7')
            ->get();
        return view('user.homepage')->with('ao_khoac',$ao_khoac)->with('ao_phong',$ao_phong)->with('giay',$giay)->with('balo',$balo)->with('phu_kien',$phu_kien)
            ->with('obj',$obj)
            ->with('obj_category',$obj_category);
    }

    public function showAbout() {
        $obj_category = Category::where('status',1)->get();
        return view('user.about')->with('obj_category',$obj_category);
    }

    public function showContact() {
        $obj_category = Category::where('status',1)->get();
        return view('user.contact')->with('obj_category',$obj_category);
    }

    public function showCategoryMasterLayout() {
        $obj_category = Category::where('status',1)->get();
        return view('layouts.user-master-layout')->with('categories',$obj_category);
    }

    public function showFAQs() {
        $obj_category = Category::where('status',1)->get();
        return view ('user.faq')->with('obj_category',$obj_category);
    }
}