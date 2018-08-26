<?php
/**
 * Created by PhpStorm.
 * User: vutie
 * Date: 8/23/2018
 * Time: 11:16 AM
 */

namespace App\Http\Controllers;


use App\Category;
use App\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class UserProductController
{
    public function index()
    {
        $obj_category = Category::where('status', 1)->get();
        $chosen_category = 0;
        $obj = Product::where('status', 1)
            ->orderBy('updated_at', 'desc')
            ->orderBy('discount', 'desc')
            ->orderBy(DB::raw("`price` - (`price` * `discount` / 100)"), 'asc')
            -> get();
        if (Input::has('categoryId') && Input::get('categoryId') != 0 ){
            $chosen_category = Input::get('categoryId');
            $obj = Product::where('category_id', $chosen_category)
                ->orderBy('updated_at', 'desc')
                ->orderBy('discount', 'desc')
                ->orderBy(DB::raw("`price` - (`price` * `discount` / 100)"), 'asc')
                -> get();
        }
        else if (Input::get('categoryId') == 0){
            $obj = Product::where('status', 1)
                ->orderBy('updated_at', 'desc')
                ->orderBy('discount', 'desc')
                ->orderBy(DB::raw("`price` - (`price` * `discount` / 100)"), 'asc')
                -> get();
        }
        return view('user.products')
            ->with('obj_category',$obj_category)
            ->with('obj',$obj)
            ->with('chosen_category',$chosen_category);
    }

    public function search(){
        $chosen_category = 0;
        if(Input::has('search') && Input::get('search') != null  && Input::has('sort') && Input::has('value1') && Input::has('value2')){
            $search = Input::get('search');
            if(Input::get('sort') == 'none'){
                $obj = Product::where('name', 'LIKE', '%'.$search.'%')
                    ->whereBetween('price' , [Input::get('value1'), Input::get('value2')])
                    ->orderBy('updated_at', 'desc')
                    ->orderBy('discount', 'desc')
                    ->orderBy(DB::raw("`price` - (`price` * `discount` / 100)"), 'asc')
                    -> get();
            }
            else{
                $obj = Product::where('name', 'LIKE', '%'.$search.'%')
                    ->whereBetween('price' , [Input::get('value1'), Input::get('value2')])
                    ->orderBy('updated_at', 'desc')
                    ->orderBy('discount', 'desc')
                    ->orderBy(DB::raw("`price` - (`price` * `discount` / 100)"), 'asc')
                    -> get();
            }
        }
        else{
            if (Input::has('categoryId') && Input::get('categoryId') != 0 && Input::has('sort') && Input::has('value1') && Input::has('value2')){
                $chosen_category = Input::get('categoryId');
                if(Input::get('sort') == 'none'){
                    $obj = Product::where('category_id', $chosen_category)
                        ->whereBetween('price' , [Input::get('value1'), Input::get('value2')])
                        ->orderBy('updated_at', 'desc')
                        ->orderBy('discount', 'desc')
                        ->orderBy(DB::raw("`price` - (`price` * `discount` / 100)"), 'asc')
                        -> get();
                }
                else{
                    $obj = Product::where('category_id', $chosen_category)
                        ->whereBetween('price' , [Input::get('value1'), Input::get('value2')])
                        ->orderBy('updated_at', 'desc')
                        ->orderBy('discount', 'desc')
                        ->orderBy(DB::raw("`price` - (`price` * `discount` / 100)"), 'asc')
                        -> get();
                }
            }
            else if (Input::get('categoryId') == 0 && Input::has('sort') && Input::has('value1') && Input::has('value2')){

                if(Input::get('sort') == 'none'){
                    $obj = Product::where('status', 1)
                        ->whereBetween('price' , [Input::get('value1'), Input::get('value2')])
                        ->orderBy('updated_at', 'desc')
                        ->orderBy('discount', 'desc')
                        ->orderBy(DB::raw("`price` - (`price` * `discount` / 100)"), 'asc')
                        -> get();
                }
                else{
                    $obj = Product::where('status', 1)
                        ->whereBetween('price' , [Input::get('value1'), Input::get('value2')])
                        ->orderBy('updated_at', 'desc')
                        ->orderBy('discount', 'desc')
                        ->orderBy(DB::raw("`price` - (`price` * `discount` / 100)"), 'asc')
                        -> get();
                }
            }
        }
        return response()->json(['obj' => $obj], 200);
    }

    public function show($id)
    {
        $obj = Product::find($id);

        $list_obj = Product::all()
            ->where('id', '!=', $obj->id)
            ->where('category_id', '=', $obj->category_id)
        ;

        if ($obj == null) {
            return view('404');
        }
        return view('user.product-detail')
            ->with('obj', $obj)
            ->with('list_obj',$list_obj);
    }
}