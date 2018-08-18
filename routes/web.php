<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.master');
});
Route::get('/login', function () {
    return view('admin.login');
});
Route::get('/create-form', function (){
    $list_categories = \App\Category::all();
    $list_brand = \App\Brand::all();
    return view('admin.product.create_form')->with('obj_category', $list_categories)->with('obj_brand', $list_brand);
});

Route::resource('admin/product','ProductController');