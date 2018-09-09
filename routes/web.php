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
Route::get('/admin/account/{id}/quickEdit','AccountController@quickEdit');
Route::put('/admin/quickUpdate/account/','AccountController@quickUpdate');

Route::get('/admin/order/change-status', 'OrderController@changeStatus');


Route::resource('admin/product','ProductController');
Route::resource('admin/category','CategoryController');
Route::resource('admin/order','OrderController');
Route::resource('admin/account','AccountController');

Route::get('/admin','DashboardController@showAdminPage');
Route::get('/admin/new-orders','DashboardController@showNewOrder');
Route::get('/admin/chart','DashboardController@getChartDataApi');
Route::get('/','HomepageController@showHomepage');

Route::get('/product','UserProductController@index');
Route::post('/product','UserProductController@search');
Route::get('/product/{product}','UserProductController@show');
Route::get('/abc', function (){
    return view('user.product-detail') ;
});

Route::get('/about', function () {
    return view('user.about');
});
Route::get('/contact', function () {
    return view('user.contact');
});
Route::post('/san-pham-test','UserProductController@search');
Route::post('/add-to-cart','ShoppingCartController@addToCart');
Route::get('/view-cart','ShoppingCartController@showCart');
Route::get('/destroy-cart', 'ShoppingCartController@destroyCart');
Route::put('/update-cart', 'ShoppingCartController@updateCart');
Route::post('/checkout', 'ShoppingCartController@checkoutCart');
Route::get('/abc','UserProductController@abc');
Route::post('/remove-item', 'ShoppingCartController@removeItem');
Route::get('/checkout', 'ShoppingCartController@checkout');
Route::get('/payment', 'ShoppingCartController@payment');

Route::get('admin/login', 'AdminLoginController@login');
Route::post('admin/login', 'AdminLoginController@postLogin');
Route::get('admin/logout', 'AdminLoginController@logout');

