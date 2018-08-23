<?php
/**
 * Created by PhpStorm.
 * User: Ngo Ngoc Nam
 * Date: 8/23/2018
 * Time: 2:47 PM
 */

namespace App\Http\Controllers;


use App\Category;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    public function showHomepage() {
        $ao_khoac = Category::where('id', 1)->first();
        $ao_phong = Category::where('id',2)->first();
        $ao_somi = Category::where('id',3)->first();
        $balo = Category::where('id',4)->first();
        $phu_kien = Category::where('id',6)->first();
        return view('user.homepage')->with('ao_khoac',$ao_khoac)->with('ao_phong',$ao_phong)->with('ao_somi',$ao_somi)->with('balo',$balo)->with('phu_kien',$phu_kien);
    }
}