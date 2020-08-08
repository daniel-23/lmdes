<?php
Route::group(['middleware' => ['auth']], function () {
	#Rutas para gestion de Parametros
	Route::get('/par-general', 'ParameterController@get_general')->name('par-general')->middleware('tiene_permiso:Parámetros Generales+Acceder');
	Route::post('/par-general', 'ParameterController@post_general')->middleware('tiene_permiso:Parámetros Generales+Crear');
	
});