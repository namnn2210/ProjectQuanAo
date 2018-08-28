<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::check()) {
            $obj = Brand::all()->where('status','=',1);
            return view('admin.brand.list')
                -> with('obj',$obj);
        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view('admin.brand.create_form');
        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $obj = new Category();
            $obj->name = Input::get('name');
            $obj->description = Input::get('description');
            $obj->country = Input::get('country');
            if (Input::hasFile('image')) {
                $image_id = time();
                Cloudder::upload(Input::file('image')->getRealPath(), $image_id);
                $obj->image = Cloudder::secureShow($image_id);
            }
            $obj->save();
            echo "<script>alert('Saved Successfull'); window.location.href = '/admin/brand'</script>";
        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::check()) {
            $obj = Brand::find($id);
            return view('admin.brand.show')
                -> with('obj',$obj);
        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::check()) {
            $obj = Brand::find($id);
            return view('admin.brand.edit')
                -> with('obj',$obj);
        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');
    }

    public function quickEdit($id)
    {
        if(Auth::check()){
            $obj = Brand::find($id);
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
        if (Auth::check()) {
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
        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');
    }

    public function quickUpdate (Request $request){
        if (Auth::check()) {
            $id = $request->input('quick-update-id');
            $obj = Brand::find($id);
            if ($obj == null) {
                return view('404');
            }
            $obj->description = Input::get('description');
            if (Input::hasFile('image')) {
                $image_id = time();
                Cloudder::upload(Input::file('image')->getRealPath(), $image_id);
                $obj->image = Cloudder::secureShow($image_id);
            }
            $obj->save();
            return redirect()->back()->with('message', 'Saved Success');
        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check()) {
            $obj = Brand::find($id);
            if ($obj == null) {
                return view('404');
            }
            $obj->status = 0;
            $obj->save();
        } else return redirect('/admin/login')->with('message', 'Bạn phải đăng nhập để sử dụng quyền admin');
    }
}
