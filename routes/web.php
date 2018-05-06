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
    return redirect('login');
});
Route::get('test', function () {
    return view('test');
});

Auth::routes();

Route::resource('distributors', 'DistributorsController');
Route::post('distributors/search', 'DistributorsController@search')->name('distributors.search');
Route::resource('products', 'ProductsController');
Route::post('products/search', 'ProductsController@search')->name('products.search');
Route::resource('transactions', 'TransactionsController');
Route::post('transactions/search', 'TransactionsController@search')->name('transactions.search');

Route::get('/home', 'HomeController@index')->name('home');
