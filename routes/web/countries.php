<?php
Route::group(['middleware' => ['auth','can:super-admin']], function () {
	#Rutas para gestion de paises
	Route::get('/paises', 'CountryController@index')->name('paises');
	Route::get('/paises/crear', 'CountryController@crear')->name('paises.crear');
	Route::post('/paises/crear', 'CountryController@create');

	Route::get('/paises/editar/{id}', 'CountryController@editar')->name('paises.editar')->where('id', '[0-9]+');
	Route::post('/paises/editar/{id}', 'CountryController@edit')->where('id', '[0-9]+');

	Route::get('/paises/cambiar-estatus/{id}', 'CountryController@cambiar_estatus')->name('paises.cambiar-estatus')->where('id', '[0-9]+');

	
});