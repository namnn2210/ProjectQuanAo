<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreCategory;
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
        $obj = Category::all();
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
    public function store(StoreCategory $request)
    {
        $request->validated();
        $obj = new Category();
        $images_list = "";
        $obj -> name = Input::get('name');
        $obj -> description = Input::get('description');
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
        $obj = Category::find($id);
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
        return view('admin.category.edit')
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
        $obj = Category::find($id);
        $obj -> name = Input::get('name');
        $obj -> description = Input::get('description');
        if (Input::hasFile('images')) {
            $image_id = time();
            Cloudder::upload(Input::file('images')->getRealPath(), $image_id);
            $obj->images = Cloudder::secureShow($image_id);
        }
        $obj -> save();
        echo "<script>alert('Saved Successfull'); window.location.href = '/admin/category'</script>";
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
        $obj->delete();
        return redirect('/admin/category/list');
    }
}
