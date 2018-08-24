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
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    public function showHomepage() {
        $ao_khoac = Category::where('id', 1)->first();
        $ao_phong = Category::where('id',2)->first();
        $giay = Category::where('id',5)->first();
        $balo = Category::where('id',4)->first();
        $phu_kien = Category::where('id',6)->first();
        $product_1 = Product::where('id',1)->first();
        $product_2 = Product::where('id',2)->first();
        $product_3 = Product::where('id',3)->first();
        $product_4 = Product::where('id',4)->first();
        $product_5 = Product::where('id',5)->first();
        $product_6 = Product::where('id',6)->first();
        $product_7 = Product::where('id',7)->first();
        $product_8 = Product::where('id',8)->first();
        $product_9 = Product::where('id',28)->first();
        return view('user.homepage')->with('ao_khoac',$ao_khoac)->with('ao_phong',$ao_phong)->with('giay',$giay)->with('balo',$balo)->with('phu_kien',$phu_kien)
            ->with('product_1',$product_1)
            ->with('product_2',$product_2)
            ->with('product_3',$product_3)
            ->with('product_4',$product_4)
            ->with('product_5',$product_5)
            ->with('product_6',$product_6)
            ->with('product_7',$product_7)
            ->with('product_8',$product_8)
            ->with('product_9',$product_9);
    }
}