<?php
Route::group(['middleware' => ['auth','can:super-admin']], function () {
	#Rutas para gestion de Escalas
	Route::get('/escalas', 'ScaleController@index')->name('escalas');
	Route::get('/escalas/get-list', 'ScaleController@get_list')->name('escalas.get-list');
	Route::get('/escalas/crear', 'ScaleController@crear')->name('escalas.crear');
	Route::post('/escalas/crear', 'ScaleController@create');

	Route::get('/escalas/traer-estados/{id}', 'ScaleController@traer_estados')->where('id', '[0-9]+');


	Route::get('/escalas/editar/{id}', 'ScaleController@editar')->name('escalas.editar')->where('id', '[0-9]+');
	Route::post('/escalas/editar/{id}', 'ScaleController@edit')->where('id', '[0-9]+');

	Route::get('/escalas/cambiar-estatus/{id}', 'ScaleController@cambiar_estatus')->name('escalas.cambiar-estatus')->where('id', '[0-9]+');
});