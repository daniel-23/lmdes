<?php
Route::group(['middleware' => ['auth','can:super-admin']], function () {
	#Rutas para gestion de Parametros
	Route::get('/par-general', 'ParameterController@get_general')->name('par-general');
	Route::post('/par-general', 'ParameterController@post_general');

	Route::get('/par-courses', 'ParameterController@get_courses')->name('par-courses');
	Route::post('/par-courses', 'ParameterController@post_courses');
	
});