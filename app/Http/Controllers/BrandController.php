<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Brand;
use JD\Cloudder\Facades\Cloudder;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obj = Brand::all();
        return view('admin.brand.list')
            -> with('obj',$obj);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj = new Brand();
        $obj -> name = Input::get('name');
        $obj -> description = Input::get('description');
        $obj -> country = Input::get('country');
        if (Input::hasFile('images')) {
            $image_id = time();
            Cloudder::upload(Input::file('images')->getRealPath(), $image_id);
            $obj->images = Cloudder::secureShow($image_id);
        }
        $obj -> save();
        echo "<script>alert('Saved Successfull'); window.location.href = '/admin/brand'</script>";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = Brand::find($id);
        return view('admin.brand.show')
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
        $obj = Brand::find($id);
        return view('admin.brand.edit')
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
        $obj = Brand::find($id);
        $obj -> name = Input::get('name');
        $obj -> description = Input::get('description');
        $obj -> country = Input::get('country');
        if (Input::hasFile('images')) {
            $image_id = time();
            Cloudder::upload(Input::file('images')->getRealPath(), $image_id);
            $obj->images = Cloudder::secureShow($image_id);
        }
        $obj -> save();
        echo "<script>alert('Saved Successfull'); window.location.href = '/admin/brand'</script>";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Brand::find($id);
        $obj->delete();
        return redirect('/admin/brand/list');
    }
}
