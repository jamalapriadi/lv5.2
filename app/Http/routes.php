<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(array('prefix'=>'admin','middleware'=>'auth.admin'),function(){
	Route::get('/','AdminController@index');
	Route::resource('kategori','KategoriController');
	Route::resource('berita','BeritaController');
	Route::get('logout','Auth\AuthController@logout');
});

Route::get('auth/login','Auth\AuthController@getLogin');
Route::post('auth/login','Auth\AuthController@proses_login');

Route::get('registrasi','RegistrasiController@index');
Route::post('registrasi','RegistrasiController@proses');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
