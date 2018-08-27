<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use JD\Cloudder\Facades\Cloudder;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obj = Category::all()->where('status', '=', 1);
        return view('admin.category.list')
            -> with('obj',$obj);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj = new Category();
        $obj -> name = Input::get('name');
        $obj -> description = Input::get('description');
        if (Input::hasFile('image')) {
            $image_id = time();
            Cloudder::upload(Input::file('image')->getRealPath(), $image_id);
            $obj->image = Cloudder::secureShow($image_id);
        }
        $obj -> save();
        echo "<script>alert('Saved Successfull'); window.location.href = '/admin/category'</script>";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obj = Category::find($id);
        if($obj==null) {
            return view('404');
        }
        return view('admin.category.show')
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
        $obj = Category::find($id);
        if($obj==null) {
            return view('404');
        }
        return view('admin.category.edit')
            -> with('obj',$obj);
    }

    public function quickEdit($id){
        $obj = Category::find($id);
        if($obj==null) {
            return view('404');
        }
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
        $obj = Category::find($id);
        if($obj==null) {
            return view('404');
        }
        $obj -> name = Input::get('name');
        $obj -> description = Input::get('description');
        if (Input::hasFile('image')) {
            $image_id = time();
            Cloudder::upload(Input::file('image')->getRealPath(), $image_id);
            $obj->image = Cloudder::secureShow($image_id);
        }
        $obj -> save();
        echo "<script>alert('Saved Successful'); window.location.href = '/admin/category'</script>";
    }

    public function quickUpdate (Request $request){
        $id = $request -> input('quick-update-id');
        $obj = Category::find($id);
        if($obj==null) {
            return view('404');
        }
        $obj -> description = Input::get('description');
        if (Input::hasFile('image')) {
            $image_id = time();
            Cloudder::upload(Input::file('image')->getRealPath(), $image_id);
            $obj->image = Cloudder::secureShow($image_id);
        }
        $obj -> save();
        return redirect()->back()->with('message', 'Saved Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $obj = Category::find($id);
        if($obj==null) {
            return response()->json(['message' => 'Category không tồn tại hoặc đã bị xoá!'], 404);
        }
        $obj->status = 0;
        $obj->save();
        return response()->json(['message' => 'Đã xoá thông tin danh mục'], 200);
    }
}
