<?php
Route::group(['middleware' => ['auth','can:super-admin']], function () {
	#Rutas para gestion de Competencias
	Route::get('/competencias', 'CompetencyController@index')->name('competencias');
	Route::get('/competencias/get-list', 'CompetencyController@get_list')->name('competencias.get-list');
	Route::get('/competencias/crear', 'CompetencyController@crear')->name('competencias.crear');
	Route::post('/competencias/crear', 'CompetencyController@create');

	Route::get('/competencias/traer-estados/{id}', 'CompetencyController@traer_estados')->where('id', '[0-9]+');


	Route::get('/competencias/editar/{id}', 'CompetencyController@editar')->name('competencias.editar')->where('id', '[0-9]+');
	Route::post('/competencias/editar/{id}', 'CompetencyController@edit')->where('id', '[0-9]+');

	Route::get('/competencias/cambiar-estatus/{id}', 'CompetencyController@cambiar_estatus')->name('competencias.cambiar-estatus')->where('id', '[0-9]+');
	
});