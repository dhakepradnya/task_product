<?php

use Illuminate\Support\Facades\Route;

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
    return view('Product/index');
});


Route::get('Product/index', 'ProductController@index')->name('Product/index');
Route::get('Product/create', 'ProductController@create')->name('Product/create');
Route::post('Product/insert', 'ProductController@insert')->name('Product/insert');
Route::get('/deleteproduct/{id}', 'ProductController@deleteproduct');
Route::GET('Product/show_image/{img_id}', 'ProductController@show_image')->name('Product/show_image');
Route::get('Product/edit/{img_id}', 'ProductController@edit')->name('Product/edit');
Route::post('Product/update', 'ProductController@update')->name('Product/update');