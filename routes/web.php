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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

// Entered by users with roles = logged in
Route::middleware('verified')->group(function () {
    Route::middleware('roles')->group(function () {

        Route::get('/personalised-product', 'ProductsController@personalise');
        Route::post('/personalised-product', 'ProductsController@personalise_add_attributes');

        Route::post('/personalised-product/generator', 'ProductsController@personalise_create_update');
        Route::get('/personalised-product/generator', 'ProductsController@personalise_create');

        Route::get('/customised-product', 'ProductsController@customise');
        Route::post('/customised-product', 'ProductsController@customise_store');

        Route::get('/product-configurator', 'ProductsController@create')
            ->name('configurator.create');

        Route::post('/product-configurator', 'ProductsController@store')
            ->name('configurator.store');

        Route::get('/myaccount/products', 'UsersController@show_allproducts')
            ->name('myaccount.show_allproducts');

        Route::get('/myaccount/products/{id}', 'UsersController@show_personalised_product' )
            ->name('myaccount.show_product');

        Route::delete('/myaccount/products/{id}', 'UsersController@delete_product')
            ->name('myaccount.delete_product');

        Route::put('/myaccount/products/{id}', 'UsersController@update_product')
            ->name('myaccount.update_product');


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

        Route::get('/user/{id}', 'AdminController@show_user');

        Route::post('/user/{id}', 'AdminController@update_user');

        Route::get('/users/create', 'AdminController@create_user_form');

        Route::post('/users/create', 'AdminController@create_user_db');

        Route::delete('/users/{id}', 'AdminController@delete_user')
            ->where('id', '[0-9]+')->name('delete_user');

        Route::get('/products', 'AdminController@show_products')->name('products');

        Route::get('/product/{id}', 'AdminController@show_product')
            ->where('id', '[0-9]+')->name('show_product');

        Route::put('/product/{id}', 'AdminController@update_product')
            ->where('id', '[0-9]+')->name('update_product');

        Route::delete('/product/{id}', 'AdminController@delete_product')
            ->where('id', '[0-9]+')->name('delete_product');
    });
});
