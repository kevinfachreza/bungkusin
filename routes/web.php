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
	Route::get('/home', 'Home\HomeController@index'	);
	Route::get('/penjual/{id}', 'Penjual\PenjualController@index');
	Route::get('/penjual/wallet/{id}','Penjual\PenjualController@wallet');
	Route::get('/kategori/{id}', 'Kategori\KategoriController@index');


	Route::get('/pkl/{id}', 'PKL\PklController@index');
	Route::post('/pkl/{id}/confirmation', 'PKL\PklController@confirmation');
	Route::post('/pkl/{id}/confirmation/submit', 'PKL\PklController@submit');
	Route::get('/pkl/antrian/{id}/{transaksi}', 'PKL\PklAntrian@index');



	Route::get('/wallet/topup/voucher', 'Wallet\Voucher@index');
	Route::post('/wallet/topup/voucher', 'Wallet\Voucher@submit');

	Route::get('/wallet/topup/transfer', 'Wallet\Transfer@index');
	Route::post('/wallet/topup/transfer', 'Wallet\Transfer@submit');

});
