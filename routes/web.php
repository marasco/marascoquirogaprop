<?php

use Illuminate\Support\Facades\Route;

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
Route::post('/', 'HomeController@postIndex');
Route::get('/', 'HomeController@getIndex');
Route::get('/home/search', 'HomeController@getSearch');
Route::get('/home/view/{id}', 'HomeController@getView');
Route::get('/propiedad/{id}', 'HomeController@getView');

Route::get('/admin', 'AdminController@getIndex');
Route::get('/admin/home', 'AdminController@getIndex');
Route::get('/admin/index', 'AdminController@getIndex');
Route::get('/admin/imagery', 'AdminController@getImagery');
Route::get('/admin/create', 'AdminController@getCreate');

Route::get('/admin/categories', 'AdminController@getCategories');
Route::get('/admin/edit-category/{id}', 'AdminController@getEditCategory');
Route::post('/admin/edit-category/{id}', 'AdminController@postNewCategory');
Route::get('/admin/new-category', 'AdminController@getNewCategory');
Route::post('/admin/new-category', 'AdminController@postNewCategory');
Route::get('/admin/delete-category/{id}', 'AdminController@getDeleteCategory');


Route::get('/admin/cities', 'AdminController@getCities');
Route::get('/admin/edit-city/{id}', 'AdminController@getEditCity');
Route::post('/admin/edit-city/{id}', 'AdminController@postNewCity');
Route::get('/admin/new-city', 'AdminController@getNewCity');
Route::post('/admin/new-city', 'AdminController@postNewCity');
Route::get('/admin/delete-city/{id}', 'AdminController@getDeleteCity');

Route::get('/admin/new', 'AdminController@getNew');
Route::post('/admin/new', 'AdminController@postNew');

Route::get('/admin/edit/{id}', 'AdminController@getEdit');
Route::post('/admin/edit/{id}', 'AdminController@postNew');

Route::post('/admin/uploads', 'AdminController@postUploads');
Route::post('/admin/delete-upload', 'AdminController@postDeleteUpload');


//Route::middleware(['web', 'guest'])->group(function () {
//    Route::get('/login', 'Auth\LoginController@showLoginForm ');
//});

//Route::controller('admin', 'AdminController'); 


Route::group(['middleware' => 'cors'], function () {

   // Route::controller('api', 'ApiController'); //, ['only' => ['store', 'update', 'show', 'index']]);

});


Route::auth();