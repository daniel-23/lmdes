<?php
Route::group(['middleware' => ['auth']], function () {
	
	Route::get('/cursos/{id}/agregar-modulo', 'ModulesController@crear')->name('cursos.add_modulo');
	Route::post('/cursos/{id}/agregar-modulo', 'ModulesController@create');
	Route::get('/modulos/{id}/editar', 'ModulesController@editar')->name('modulos.editar');
	Route::post('/modulos/{id}/editar', 'ModulesController@edit');
	
	
});