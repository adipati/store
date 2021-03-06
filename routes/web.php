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

// Distributor
Route::resource('distributors', 'DistributorsController')->except(['show']);
// Produk
Route::resource('products', 'ProductsController')->except(['show']);
// Transacsi
Route::resource('transactions', 'TransactionsController');

// Pencarian
Route::get('products/search', 'ProductsController@search')->name('products.search');
Route::get('distributors/search', 'DistributorsController@search')->name('distributors.search');
Route::get('transactions/search', 'TransactionsController@search')->name('transactions.search');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
