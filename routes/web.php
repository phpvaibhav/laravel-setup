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

Route::get('/', function()
{
	 if(Auth::check()){
	    return Redirect::to("dashboard");
	  }
    return View::make('pages.login');
});
/*Route::get('dashboard', function()
{
    return View::make('pages.dashboard');
});*/
Route::get('register', function()
{
	 if(Auth::check()){
        return Redirect::to("dashboard");
      }
    return View::make('pages.register');
});
Route::get('forgot', function()
{
	 if(Auth::check()){
        return Redirect::to("dashboard");
      }
    return View::make('pages.forgot');
});

Route::post('post-register', 'AuthController@postRegister'); 
Route::post('post-login', 'AuthController@postLogin'); 



	Route::middleware(['UserSession'])->group(function(){

		Route::get('dashboard', function()
					{
						 $data['front_scripts'] = array('vendor/chart.js/Chart.min.js','js/demo/chart-area-demo.js','js/demo/chart-pie-demo.js');
					    return View::make('pages.dashboard',$data);
					}); 
		Route::get('logout', 'AuthController@logout');
		Route::get('change-password', 'AuthController@changePassword');
		Route::post('updatePassword', 'AuthController@updatePassword');
		Route::resource('products', 'ProductController');
		Route::post('products/store', 'ProductController@store');
		Route::get('profile', 'ProfileController@index');
		Route::get('change-password', 'ProfileController@change_pass');
		Route::get('profile-image', 'ProfileController@profile_image');
		Route::post('updatePassword', 'ProfileController@updatePassword');
		Route::post('updateProfile', 'ProfileController@updateProfile');
		Route::post('updateImage', 'ProfileController@updateImage');
		Route::get('send-mail', 'ProfileController@sendMail');
		Route::post('google-mail', 'ProfileController@googleMail');
		//Route::resource('ajax-crud', 'AjaxController');
		Route::get('customers','AjaxController@index');
		Route::post('customer-create','AjaxController@create');
		Route::get('customer-list', 'AjaxController@customerList');
		//Route::delete('customer-delete', 'AjaxController@destroy');
		Route::delete('customer-delete/{id}', 'AjaxController@destroy')->name('customer.destroy');
	}); 
