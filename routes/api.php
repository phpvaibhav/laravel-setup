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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::fallback(function(){
    return response()->json([
        'message' => 'Api is not found.'], 404);
});
Route::post('v1/login', 'API\UserController@login');
Route::post('v1/register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
	Route::get('v1/test', 'API\UserController@test');
	Route::post('v1/details', 'API\UserController@details');
	Route::get('v1/products', 'API\ProductController@index');
	Route::post('v1/add_product', 'API\ProductController@add_product');
	Route::post('v1/update_product', 'API\ProductController@update_product');
	
});
/*Route::middleware('auth:api')->group(function () {
   Route::get('v1/test', 'API\UserController@test');
});*/

