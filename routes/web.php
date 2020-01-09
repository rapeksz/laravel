<?php

use App\Http\Controllers\ProductsController;

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

// URLs available for everyone
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Entered only by users with roles = logged in
Route::middleware('roles')->group(function () {

    Route::get('/product-configurator', 'ProductsController@create')
        ->name('configurator.create');

    Route::post('/product-configurator', 'ProductsController@store')
        ->name('configurator.store');

    Route::get('/myaccount', 'UsersController@index')->name('myaccount.index');
});
// URLS with admin prefix entered by admin only - grouping middleware by role "admin"
Route::group([
    // naming doesn't work
    'name' => 'admin.',
    'middleware' => 'roles',
    // 'roles' is a parameter of a group
    'roles' => 'Admin',
    'prefix' => 'admin'
], function () {

    Route::get('/', 'AdminController@index')->name('index');

    Route::get('/users', 'AdminController@show_users')->name('users');

    Route::get('/products', 'AdminController@show_products')->name('products');

    Route::get('/product/{id}', 'AdminController@show_product')
        ->where('id', '[0-9]+')->name('show_product');

    Route::put('/product/{id}', 'AdminController@update_product')
        ->where('id', '[0-9]+')->name('update_product');

    Route::delete('/product/{id}', 'AdminController@delete_product')
        ->where('id', '[0-9]+')->name('delete_product');

    // updating order by admin in the db
    // Route::post('/product/{id}', 'AdminController@update_product')
    //     ->where('id', '[0-9]+')->name('store_product');

});
