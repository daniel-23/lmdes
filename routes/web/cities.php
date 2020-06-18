<?php
Route::group(['middleware' => ['auth','can:super-admin']], function () {
	#Rutas para gestion de Ciudades
	Route::get('/ciudades', 'CityController@index')->name('ciudades');
	Route::get('/ciudades/get-list', 'CityController@get_list')->name('ciudades.get-list');
	Route::get('/ciudades/crear', 'CityController@crear')->name('ciudades.crear');
	Route::post('/ciudades/crear', 'CityController@create');

	Route::get('/ciudades/traer-estados/{id}', 'CityController@traer_estados')->where('id', '[0-9]+');


	Route::get('/ciudades/editar/{id}', 'CityController@editar')->name('ciudades.editar')->where('id', '[0-9]+');
	Route::post('/ciudades/editar/{id}', 'CityController@edit')->where('id', '[0-9]+');

	Route::get('/ciudades/cambiar-estatus/{id}', 'CityController@cambiar_estatus')->name('ciudades.cambiar-estatus')->where('id', '[0-9]+');
	
});