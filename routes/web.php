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
    return view('welcome');
});

Route::resource('products', 'ProductController');
Route::get('product/soft/delete/{id}', 'ProductController@softDelete')->name('soft.delete');
Route::get('product/trash', 'ProductController@productTrashed')->name('products.trash');
Route::get('product/back/trash/{id}', 'ProductController@backTrash')->name('products.back.trash');
