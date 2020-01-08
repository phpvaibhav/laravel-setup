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
Route::post('v1/login', 'API\UserController@login');
Route::post('v1/register', 'API\UserController@register');
Route::get('v1/test', 'API\UserController@test');
Route::group(['middleware' => 'auth:api'], function(){
	Route::get('v1/test', 'API\UserController@test');
	Route::post('v1/details', 'API\UserController@details');
	
});
/*Route::middleware('auth:api')->group(function () {
   Route::get('v1/test', 'API\UserController@test');
});*/

