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

Route::get('/', 'HomeController@getIndex'); 
Route::post('/', 'HomeController@postIndex'); 

Route::controller('/home', 'HomeController'); 
Route::get('/home/view/{id}', 'HomeController@view');

Route::controller('admin', 'AdminController'); 


Route::group(['middleware' => 'cors'], function () {

    Route::controller('api', 'ApiController'); //, ['only' => ['store', 'update', 'show', 'index']]);

});


Route::auth();
