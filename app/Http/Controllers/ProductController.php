<?php

namespace App\Http\Controllers;

use App\Product;
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
        return view('admin.product.create2');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj = new Product();
        $obj -> name = Input::get('name');
        $obj -> description = Input::get('description');
        $obj -> categoryId = Input::get('categoryId');
        $obj -> price = Input::get('price');
//        if (Input::hasFile('images')) {
//            $image_id = time();
//            Cloudder::upload(Input::file('images')->getRealPath(), $image_id);
//            $obj->images = Cloudder::secureShow($image_id);
//        }
        $obj -> brand_id = Input::get('brandId');
        $obj -> save();
        $productId = $obj -> id;
        return view('welcome')
            ->with("productId",$productId);
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
        if (Input::hasFile('images')) {
            $image_id = time();
            Cloudder::upload(Input::file('images')->getRealPath(), $image_id);
            $obj->images = Cloudder::secureShow($image_id);
        }
        $obj -> brandId = Input::get('brandId');
        $obj -> save();
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
        return redirect('/admin/product/list');
    }
}
