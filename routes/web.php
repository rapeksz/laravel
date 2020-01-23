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


Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

// Entered by users with roles = logged in
Route::middleware('verified')->group(function () {
    Route::middleware('roles')->group(function () {

        Route::get('/personalised-product', 'ProductsController@personalise');

        Route::post('/personalised-product', 'ProductsController@personalise_add_attributes');

        Route::post('/personalised-product/generator', 'ProductsController@test_personalise');
        // Route::post('/personalised-product/generator', 'ProductsController@personalise_create_update');

        Route::get('/personalised-product/generator', 'ProductsController@personalise_create');

        Route::get('/myaccount/products', 'UsersController@show_allproducts')
            ->name('myaccount.show_allproducts');

        Route::get('/myaccount/products/{id}', 'UsersController@show_personalised_product' )
            ->name('myaccount.show_product');

        Route::delete('/myaccount/products/{id}', 'UsersController@delete_product')
            ->name('myaccount.delete_product');

        Route::put('/myaccount/products/{id}', 'UsersController@update_product')
            ->name('myaccount.update_product');
    });

    Route::group([
        'name' => 'admin.',
        'middleware' => 'roles',
        'roles' => 'Admin',
        'prefix' => 'admin'
    ], function () {

        Route::get('/', 'AdminController@index')->name('index');

        Route::get('/users', 'AdminController@show_users')->name('users');

        Route::get('/user/{id}', 'AdminController@show_user');

        Route::post('/user/{id}', 'AdminController@update_user');

        Route::get('/users/create', 'AdminController@create_user_form');

        Route::post('/users/create', 'AdminController@create_user_db');

        Route::delete('/users/{id}', 'AdminController@delete_user')
            ->where('id', '[0-9]+')->name('delete_user');

        Route::get('/products', 'AdminController@show_products')->name('products');

    });
});
