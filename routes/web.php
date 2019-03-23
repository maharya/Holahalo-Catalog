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
// Route::group(['middleware' => 'revalidate'], function(){
    Route::get('/', [
		'uses' => 'IndexController@index',
		'as' => 'index'
	]);
    
    Route::get('/loginForm', [
		'uses' => 'LoginController@index',
		'as' => 'loginForm'
	]);

    Route::post('/login', [
		'uses' => 'LoginController@login',
		'as' => 'login'
	]);

	Route::post('/logout', [
		'uses' => 'LoginController@logout',
		'as' => 'logout'
    ]);

    Route::prefix('category')->group(function () {
        Route::get('/index', [
            'uses' => 'CategoryController@index',
            'as' => 'category.index'
        ]);
        Route::get('/create', [
            'uses' => 'CategoryController@create',
            'as' => 'category.create'
        ]);
        Route::post('/store', [
            'uses' => 'CategoryController@store',
            'as' => 'category.store'
        ]);
        Route::post('/edit', [
            'uses' => 'CategoryController@edit',
            'as' => 'category.edit'
        ]);
        Route::post('/update', [
            'uses' => 'CategoryController@update',
            'as' => 'category.update'
        ]);
        Route::get('/destroy/{id}', [
            'uses' => 'CategoryController@destroy',
            'as' => 'category.destroy'
        ]);
    });

    Route::prefix('product')->group(function () {
        Route::get('/all', [
            'uses' => 'ProductController@all',
            'as' => 'product.all'
        ]);
        Route::get('/detail/{id}', [
            'uses' => 'ProductController@show',
            'as' => 'product.detail'
        ]);
        Route::get('/index', [
            'uses' => 'ProductController@index',
            'as' => 'product.index'
        ]);
        Route::get('/create', [
            'uses' => 'ProductController@create',
            'as' => 'product.create'
        ]);
        Route::post('/store', [
            'uses' => 'ProductController@store',
            'as' => 'product.store'
        ]);
        Route::get('/edit/{id}', [
            'uses' => 'ProductController@edit',
            'as' => 'product.edit'
        ]);
        Route::post('/update/{id}', [
            'uses' => 'ProductController@update',
            'as' => 'product.update'
        ]);
        Route::get('/destroy/{id}/{fileName}', [
            'uses' => 'ProductController@destroy',
            'as' => 'product.destroy'
        ]);
    });
// });
