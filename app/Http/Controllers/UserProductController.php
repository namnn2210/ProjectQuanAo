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
        $obj = Product::where('status', 1)->paginate(6);
        if (Input::has('categoryId') && Input::get('categoryId') != 0 ){
            $chosen_category = Input::get('categoryId');
            $obj = Product::where('category_id', $chosen_category)->paginate(6);
            if(Input::has('sort') && Input::has('value1') && Input::has('value2')){
                $obj = Product::where('category_id', $chosen_category) -> whereBetween('price' , [Input::get('value1'), Input::get('value2')]) -> orderBy('price', Input::get('sort'))->paginate(6);
            }
            else if(Input::has('value1') && Input::has('value2')){
                $obj = Product::where('category_id', $chosen_category) -> whereBetween('price' , [Input::get('value1'), Input::get('value2')]) -> paginate(6);
            }
            else if(Input::has('sort')){
                $obj = Product::where('category_id', $chosen_category) -> orderBy('price', Input::get('sort'))->paginate(6);
            }
        }
        else if (Input::get('categoryId') == 0 && Input::has('sort') && Input::has('value1') && Input::has('value2')){
            $obj = Product::where('status', 1)->  whereBetween('price' , [Input::get('value1'), Input::get('value2')]) -> orderBy('price', Input::get('sort'))->paginate(6);
        }
        else if (Input::get('categoryId') == 0 && Input::has('sort')){
            $obj = Product::where('status', 1)->orderBy('price', Input::get('sort'))->paginate(6);
        }
        else if (Input::get('categoryId') == 0 && Input::has('value1') && Input::has('value2')){
            $obj = Product::where('status', 1)-> whereBetween('price' , [Input::get('value1'), Input::get('value2')]) -> paginate(6);
        }
        return view('user.products')
            ->with('obj_category',$obj_category)
            ->with('obj',$obj)
            ->with('chosen_category',$chosen_category);
    }

    public function search(){
        $name = Input::get('name');
        $obj_category = Category::where('status', 1)->get();
        $obj = Product::where('name', 'LIKE', '%'.$name.'%')->paginate(6);
        return view('user.products')
            ->with('obj_category',$obj_category)
            ->with('obj',$obj);
    }
}