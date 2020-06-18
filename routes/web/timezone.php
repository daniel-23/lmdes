<?php
Route::group(['middleware' => ['auth','can:super-admin']], function () {
	#Rutas para gestion de Zonas horarias
	Route::get('/zona-horaria', 'TimeZoneController@index')->name('zona-horaria');
	Route::get('/zona-horaria/crear', 'TimeZoneController@crear')->name('zona-horaria.crear');
	Route::post('/zona-horaria/crear', 'TimeZoneController@create');

	Route::get('/zona-horaria/editar/{id}', 'TimeZoneController@editar')->name('zona-horaria.editar')->where('id', '[0-9]+');
	Route::post('/zona-horaria/editar/{id}', 'TimeZoneController@edit')->where('id', '[0-9]+');
});