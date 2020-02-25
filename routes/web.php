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
    return view('product');
});

Route::get('product', 'ProductController@store');
Route::get('brands', 'ProductController@brands');
Route::get('get', 'ProductController@allProducts');
Route::get('byBrand/{brand}', 'ProductController@productsByBrand');

