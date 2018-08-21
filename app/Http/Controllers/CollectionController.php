<?php

namespace App\Http\Controllers;

use App\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\Rules\In;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $obj = Collection::all();
        return view('admin.collection.list')->with('obj',$obj);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.collection.create_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $obj = new Collection();
        $obj -> name = Input::get('name');
        $obj -> description = Input::get('description');
        $obj->save();

        return redirect('admin/collection');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $obj = Collection::find($id);
        if($obj == null) {
            return view('404');
        }
        return view('admin.collection.edit')->with('obj',$obj);
    }

    public function quickEdit($id){
        $obj = Collection::find($id);
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
        //
        $obj = Collection::find($id);
        if($obj==null) {
            return view('404');
        }
        $obj -> name = Input::get('name');
        $obj -> description = Input::get('description');
        $obj -> save();
        echo "<script>alert('Saved Successful'); window.location.href = '/admin/collection'</script>";
    }

    public function quickUpdate (Request $request){
        $id = $request -> input('quick-update-id');
        $obj = Collection::find($id);
        if($obj==null) {
            return view('404');
        }
        $obj -> name = Input::get('name');
        $obj -> description = Input::get('description');
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
        //
    }
}
