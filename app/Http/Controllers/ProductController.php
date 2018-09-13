<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Http\Requests\StoreProduct;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Support\Facades\Response;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        if(Auth::check()){
//            $obj = Product::all()->where('status','=',1);
//            $obj_category = Category::all();
//            $obj_brand = Brand::all();
//            return view('admin.product.list')
//                -> with('obj',$obj)
//                -> with('obj_category',$obj_category)
//                -> with('obj_brand',$obj_brand);
//        }
//        else return redirect('/admin/login')->with('message','Bạn phải đăng nhập để sử dụng quyền admin');
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
                return Response::json($chart_data);
            } else {
                $chart_data = Order::select(DB::raw('sum(total_price) as revenue'), DB::raw('date(created_at) as day'))
                    ->where('status',2)
                    ->groupBy('day')
                    ->orderBy('day', 'desc')
                    ->get();
                return Response::json($chart_data);
            }

        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::check()){
            $obj_category = Category::all();
            $obj_brand = Brand::all();
            return view('admin.product.create_form')
                ->with('obj_category',$obj_category)
                ->with('obj_brand',$obj_brand);
        }
        else return redirect('/admin/login')->with('message','Bạn phải đăng nhập để sử dụng quyền admin');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        if(Auth::check()){
            $request->validated();
            $obj = new Product();
            if($obj==null) {
                return view('404');
            }
            $images_list = "";
            $obj -> name = Input::get('name');
            $obj -> description = Input::get('description');
            $obj -> category_id = Input::get('categoryId');
            $obj -> price = Input::get('price');
            $obj -> brand_id = Input::get('brand_id');
            $obj -> images = $images_list;
            $images = $request -> file('images');
            if($request -> hasFile('images')){
                foreach ($images as $image) {
                    $image_id = time();
                    Cloudder::upload($image->getRealPath(), $image_id);
                    $images_list .= Cloudder::secureShow($image_id) . "&";
                }
            }
            $obj -> images = $images_list;
            $obj -> save();
            return redirect()->back()->with('message', 'Saved Success');
        }
        else return redirect('/admin/login')->with('message','Bạn phải đăng nhập để sử dụng quyền admin');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::check()){
            $obj = Product::find($id);
            if($obj==null) {
                return view('404');
            }
            return view('admin.product.show')
                -> with('obj',$obj);
        }
        else return redirect('/admin/login')->with('message','Bạn phải đăng nhập để sử dụng quyền admin');


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::check()){
            $obj = Product::find($id);
            if($obj==null) {
                return view('404');
            }
            $obj_category = Category::all();
            $obj_brand = Brand::all();
            if($obj==null) {
                return view('404');
            }
            return view('admin.product.edit')
                -> with('obj',$obj)->with('obj_brand',$obj_brand)->with('obj_category',$obj_category);
        }
        else return redirect('/admin/login')->with('message','Bạn phải đăng nhập để sử dụng quyền admin');


    }

    public function quickEdit($id){
        if(Auth::check()){
            $obj = Product::find($id);
            if($obj==null) {
                return view('404');
            }
            return response()->json(['obj' => $obj], 200);
        }
        else return redirect('/admin/login')->with('message','Bạn phải đăng nhập để sử dụng quyền admin');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::check()){

        }
        else return redirect('/admin/login')->with('message','Bạn phải đăng nhập để sử dụng quyền admin');
    }

    public function quickUpdate (Request $request){
        if(Auth::check()){
            $id = $request -> input('quick-update-id');
            $obj = Product::find($id);
            if($obj==null) {
                return view('404');
            }
            $remain_images = Input::get('remain-images');
            $obj -> price = Input::get('price');
            $obj -> name = Input::get('name');
            $obj -> description = Input::get('description');
            $obj -> category_id = Input::get('category_id');
            $obj -> price = Input::get('price');
            $obj -> brand_id = Input::get('brand_id');
            $images = $request -> file('images');
            if($request -> hasFile('images')){
                foreach ($images as $image) {
                    $image_id = time();
                    Cloudder::upload($image->getRealPath(), $image_id);
                    $remain_images .= Cloudder::secureShow($image_id) . "&";
                }
            }
            $obj -> images = $remain_images;
            $obj -> save();
            return redirect()->back()->with('message', 'Saved Success');
        }
        else return redirect('/admin/login')->with('message','Bạn phải đăng nhập để sử dụng quyền admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::check()){
            $obj = Product::find($id);
            if($obj==null) {
                return view('404');
            }
            $obj->status = 0;
            $obj->save();
        }
        else return redirect('/admin/login')->with('message','Bạn phải đăng nhập để sử dụng quyền admin');
    }
}
