<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Http\Requests\StoreProduct;
use App\Product;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use JD\Cloudder\Facades\Cloudder;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obj = Product::all();
        return view('admin.product.list')
            -> with('obj',$obj);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $obj_category = Category::all();
        $obj_brand = Brand::all();
        return view('admin.product.create_form')
            ->with('obj_category',$obj_category)
            ->with('obj_brand',$obj_brand);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        $request->validated();
        $obj = new Product();
        $images_list = "";
        $obj -> name = Input::get('name');
        $obj -> description = Input::get('description');
        $obj -> categoryId = Input::get('categoryId');
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = Product::find($id);
        return view('admin.product.show')
            -> with('obj',$obj);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = Product::find($id);
        return view('admin.product.edit')
            -> with('obj',$obj);
    }

    public function quickEdit($id){
        $obj = Product::find($id);
        return response()->json(['obj' => $obj], 200);
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
        $obj = Product::find($id);
        $obj -> name = Input::get('name');
        $obj -> detail = Input::get('detail');
        $obj -> description = Input::get('description');
        $obj -> categoryId = Input::get('categoryId');
        $obj -> price = Input::get('price');
        $obj -> brandId = Input::get('brandId');
        $obj -> save();
        $productId = $id;
        $images = $request -> file('images');
        if($request -> hasFile('images')) {
            foreach ($images as $image) {
                $obj = Product::find($productId);
                $image_id = time();
                Cloudder::upload($image->getRealPath(), $image_id);
                $obj->image = Cloudder::secureShow($image_id);
                $obj->save();
            }
        }
        echo "<script>alert('Saved Successfull'); window.location.href = '/admin/product'</script>";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Product::find($id);
        $obj->delete();
    }
}
