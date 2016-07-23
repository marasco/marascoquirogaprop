<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*
Route::group(['middleware' => 'guest'], function () {

	Route::get('/', 'HomeController@index');
});

Route::group(['middleware' => 'auth'], function () {

	Route::group(['prefix'=> 'admin'], function () {

		Route::get('index', [
    		'as' => 'adminIndex', 'uses' => 'AdminController@index'
		]);
	});
});
 */
Route::get('/', 'HomeController@index');
Route::controller('admin', 'AdminController');
Route::auth();
