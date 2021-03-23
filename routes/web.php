<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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
    return view('main');
});
//show in table
Route::get('/products', 'ProductController@index')->name('product.index');
//creation of data
Route::get('/create', 'ProductController@create')->name('create.product');
//store data in db
Route::post('/store', 'ProductController@store')->name('product.store');
//show data for edit
Route::get('/edit/product/{id}', 'ProductController@edit');
//update data
Route::post('/update/product/{id}', 'ProductController@update');
//delete data
Route::get('/delete/product/{id}', 'ProductController@delete');
//show data in next page
Route::get('/show/product/{id}', 'ProductController@show');




// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
