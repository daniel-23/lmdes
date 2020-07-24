<?php
Route::group(['middleware' => ['auth']], function () {
	#Rutas para gestion de Competencias
	Route::get('/competencias', 'CompetencyController@index')->name('competencias')->middleware('tiene_permiso:Competencias+Acceder');
	Route::get('/competencias/get-childs/{id}', 'CompetencyController@get_childs')->middleware('tiene_permiso:Competencias+Acceder');
	Route::get('/competencias/get-list', 'CompetencyController@get_list')->name('competencias.get-list')->middleware('tiene_permiso:Competencias+Acceder');
	Route::get('/competencias/crear', 'CompetencyController@crear')->name('competencias.crear')->middleware('tiene_permiso:Competencias+Crear');
	Route::post('/competencias/crear', 'CompetencyController@create')->middleware('tiene_permiso:Competencias+Crear');

	Route::get('/competencias/traer-estados/{id}', 'CompetencyController@traer_estados')->where('id', '[0-9]+');


	Route::get('/competencias/editar/{id}', 'CompetencyController@editar')->name('competencias.editar')->where('id', '[0-9]+')->middleware('tiene_permiso:Competencias+Editar');
	Route::post('/competencias/editar/{id}', 'CompetencyController@edit')->where('id', '[0-9]+')->middleware('tiene_permiso:Competencias+Editar');

	Route::get('/competencias/cambiar-estatus/{id}', 'CompetencyController@cambiar_estatus')->name('competencias.cambiar-estatus')->where('id', '[0-9]+')->middleware('tiene_permiso:Competencias+Cambiar Estado');
	
});