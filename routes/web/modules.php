<?php
Route::group(['middleware' => ['auth']], function () {
	
	Route::get('/cursos/{id}/agregar-modulo', 'ModulesController@crear')->name('cursos.add_modulo');
	Route::post('/cursos/{id}/agregar-modulo', 'ModulesController@create');
	Route::get('/modulos/{id}/editar', 'ModulesController@editar')->name('modulos.editar');
	Route::post('/modulos/{id}/editar', 'ModulesController@edit');
	Route::post('/modulos/subir-archivo', 'ModulesController@subir_archivo')->name('modulos.subir_archivo');
	Route::get('/modulos/descargar-archivo/{id}', 'ModulesController@descargar_archivo')->name('file.dowload');
});