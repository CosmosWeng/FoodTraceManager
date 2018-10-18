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
    return view('welcome');
});

// Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::middleware(['auth'])->group(function () {
    Route::get('admin/categories', ['as' => 'admin.categories.index', 'uses' => 'CategoryController@index']);
    Route::post('admin/categories', ['as' => 'admin.categories.store', 'uses' => 'CategoryController@store']);
    Route::get('admin/categories/create', ['as' => 'admin.categories.create', 'uses' => 'CategoryController@create']);
    Route::put('admin/categories/{categories}', ['as' => 'admin.categories.update', 'uses' => 'CategoryController@update']);
    Route::patch('admin/categories/{categories}', ['as' => 'admin.categories.update', 'uses' => 'CategoryController@update']);
    Route::delete('admin/categories/{categories}', ['as' => 'admin.categories.destroy', 'uses' => 'CategoryController@destroy']);
    Route::get('admin/categories/{categories}', ['as' => 'admin.categories.show', 'uses' => 'CategoryController@show']);
    Route::get('admin/categories/{categories}/edit', ['as' => 'admin.categories.edit', 'uses' => 'CategoryController@edit']);

    Route::get('admin/opendatas', ['as' => 'admin.opendatas.index', 'uses' => 'OpendataController@index']);
    Route::post('admin/opendatas', ['as' => 'admin.opendatas.store', 'uses' => 'OpendataController@store']);
    Route::get('admin/opendatas/create', ['as' => 'admin.opendatas.create', 'uses' => 'OpendataController@create']);
    Route::put('admin/opendatas/{opendatas}', ['as' => 'admin.opendatas.update', 'uses' => 'OpendataController@update']);
    Route::patch('admin/opendatas/{opendatas}', ['as' => 'admin.opendatas.update', 'uses' => 'OpendataController@update']);
    Route::delete('admin/opendatas/{opendatas}', ['as' => 'admin.opendatas.destroy', 'uses' => 'OpendataController@destroy']);
    Route::get('admin/opendatas/{opendatas}', ['as' => 'admin.opendatas.show', 'uses' => 'OpendataController@show']);
    Route::get('admin/opendatas/{opendatas}/edit', ['as' => 'admin.opendatas.edit', 'uses' => 'OpendataController@edit']);

    Route::get('admin/products', ['as' => 'admin.products.index', 'uses' => 'ProductController@index']);
    Route::post('admin/products', ['as' => 'admin.products.store', 'uses' => 'ProductController@store']);
    Route::get('admin/products/create', ['as' => 'admin.products.create', 'uses' => 'ProductController@create']);
    Route::put('admin/products/{products}', ['as' => 'admin.products.update', 'uses' => 'ProductController@update']);
    Route::patch('admin/products/{products}', ['as' => 'admin.products.update', 'uses' => 'ProductController@update']);
    Route::delete('admin/products/{products}', ['as' => 'admin.products.destroy', 'uses' => 'ProductController@destroy']);
    Route::get('admin/products/{products}', ['as' => 'admin.products.show', 'uses' => 'ProductController@show']);
    Route::get('admin/products/{products}/edit', ['as' => 'admin.products.edit', 'uses' => 'ProductController@edit']);
});
Route::get('google_sheet_sync', 'GoogleSheetSyncController@sync');
