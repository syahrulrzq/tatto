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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::group(['prefix'=>'admin'], function(){
		Route::get('pesanan', 'PesananController@getPesanan');
		Route::get('pesanan/{id}/reject', 'PesananController@update_reject');
		Route::get('pesanan/{id}/accept','PesananController@update_accept');
});
Route::get('order', 'OrderController@getOrder');
Route::get('order/check', 'OrderController@checkOrder');
Route::get('pesan', 'UserController@getPesan');
Route::post('pesan/store', 'PemesananController@submit');


Route::get('/images/{filename}',
	function ($filename)
{
	$path = storage_path().
	'/' . $filename;
	$file = File::get($path);
	$type = File::mimeType($path);
	$response = Response::make($file, 200);
	$response->header("Content-Type", $type);
	return $response;
});	

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
