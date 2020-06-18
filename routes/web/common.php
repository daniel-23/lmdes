<?php
Route::group(['middleware' => ['auth']], function () {


	Route::get('/', 'HomeController@index')->name('home');
	Route::get('/session-time', 'HomeController@session_time')->name('session.time');
	Route::post('/logout', 'LoginController@logout')->name('logout');
	Route::get('/language/{lan}', 'HomeController@set_language')->name('set.language');
	
	
});