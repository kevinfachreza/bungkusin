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

Auth::routes();

Route::get('/random/users/penjual','Random\RandomController@penjual');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->middleware('auth');

Route::group(['middleware' => ['auth']], function () {	

	Route::get('/', 'Home\HomeController@index');
	Route::get('/home', 'Home\HomeController@index');


	Route::get('/kategori/{id}', 'Kategori\KategoriController@index');
	Route::get('/pkl/{id}', 'PKL\PklController@index');
	Route::post('/pkl/{id}/confirmation', 'PKL\PklController@confirmation');
	Route::post('/pkl/{id}/confirmation/submit', 'PKL\PklController@submit');


});
