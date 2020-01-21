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

Route::get('admin/login','AdminLoginController@loginForm')->name('admin.login.form');
Route::post('admin/login','AdminLoginController@login')->name('login');

Route::middleware('auth')->prefix('admin')->group(function (){

    Route::resource('user','UserController');
    Route::post('user/{id}/restore','UserController@restore')->name('user.restore');
    Route::post('user/{id}/delete','UserController@delete')->name('user.delete');


    Route::get('dashboard','DashboardController@index')->name('admin.dashboard');
    Route::resource('category','CategoryController');
    Route::post('category/{id}/restore','CategoryController@restore')->name('category.restore');
    Route::delete('category/{id}/delete','CategoryController@delete')->name('category.delete');
    Route::resource('brand','BrandController');
    Route::post('brand/{id}/restore','BrandController@restore')->name('brand.restore');
    Route::delete('brand/{id}/delete','BrandController@delete')->name('brand.delete');
    Route::resource('product','ProductController');
    Route::post('product/{id}/restore','ProductController@restore')->name('product.restore');
    Route::delete('product/{id}/delete','ProductController@delete')->name('product.delete');
    Route::get('product/{image_id}/delete/image','ProductController@delete_image')->name('product.delete.image');


});

Route::get('/test','HomeController@index')->name('home');

Route::get('/','FrontendController@index')->name('home2');
Route::get('products/{id?}','Front\ProductController@index')->name('front.product.index');
Route::get('product/{id}','Front\ProductController@details')->name('product.details');
Route::get('cart','Front\ProductController@cart')->name('cart');

Route::post('customer/store','Front\CustomerController@store')->name('customer.store');
Route::get('checkout','Front\CheckoutController@index')->name('checkout');
Route::get('payment/{customer_id}/{order_id}','Front\CheckoutController@payment')->name('payment');
Route::get('ajax/add-to-cart/{product_id}','Front\AjaxController@addToCart')->name('ajax.addToCart');

Route::get('logout',function(){
    auth()->logout();
    return redirect()->route('admin.login.form');
})->name('logout');