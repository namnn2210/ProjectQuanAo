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
use Illuminate\Support\Facades\Input;


class UserProductController
{
    public function index()
    {
        $obj_category = Category::where('status', 1)->get();
        $chosen_category = 0;
        $obj = Product::where('status', 1)->get();
        if (Input::has('categoryId') && Input::get('categoryId') != 0 ){
            $chosen_category = Input::get('categoryId');
            $obj = Product::where('category_id', $chosen_category)->get();
        }
        else if (Input::get('categoryId') == 0){
            $obj = Product::where('status', 1)-> get();
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
            $obj = Product::where('name', 'LIKE', '%'.$search.'%')
                ->whereBetween('price' , [Input::get('value1'), Input::get('value2')])
                ->orderBy('price', Input::get('sort'))
                ->get();
        }
        else{
            if (Input::has('categoryId') && Input::get('categoryId') != 0 && Input::has('sort') && Input::has('value1') && Input::has('value2')){
                $chosen_category = Input::get('categoryId');
                $obj = Product::where('category_id', $chosen_category)
                    ->whereBetween('price' , [Input::get('value1'), Input::get('value2')])
                    ->orderBy('price', Input::get('sort'))
                    ->get();
            }
            else if (Input::get('categoryId') == 0 && Input::has('sort') && Input::has('value1') && Input::has('value2')){
                $obj = Product::where('status', 1)
                    ->whereBetween('price' , [Input::get('value1'), Input::get('value2')])
                    ->orderBy('price', Input::get('sort'))
                    -> get();
            }
        }
        return response()->json(['obj' => $obj], 200);
    }
}