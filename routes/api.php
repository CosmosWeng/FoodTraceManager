<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('products', 'API\ProductAPIController');

Route::get('categories', 'API\CategoryAPIController@index');
// Route::get('categories/{id}/products', 'API\CategoryAPIController@getProducts');

Route::resource('topics', 'API\TopicAPIController');

Route::resource('knowledge', 'API\KnowledgeAPIController');
