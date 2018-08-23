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
Route::get('/admin/product/{id}/quickEdit','ProductController@quickEdit');
Route::put('/admin/quickUpdate/product/','ProductController@quickUpdate');
Route::get('/admin/category/{id}/quickEdit','CategoryController@quickEdit');
Route::put('/admin/quickUpdate/category/','CategoryController@quickUpdate');
Route::get('/admin/collection/{id}/quickEdit','CollectionController@quickEdit');
Route::put('/admin/quickUpdate/collection/','CollectionController@quickUpdate');


Route::resource('admin/product','ProductController');
Route::resource('admin/category','CategoryController');
Route::resource('admin/collection','CollectionController');

Route::get('/register', function () {
    return view('admin.register');
});
Route::get('/login', function () {
    return view('admin.login');
});
Route::get('/', function () {
   return view('layouts.master');
});

Route::get('/homepage',function () {
   return view('user.homepage');
});

Route::get('admin/login', 'AdminLoginController@login');
Route::post('admin/login', 'AdminLoginController@postLogin');


