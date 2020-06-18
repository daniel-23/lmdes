<?php
Route::group(['middleware' => ['auth','can:super-admin']], function () {
	#Rutas para gestion de Cursos
	
	Route::get('/cursos/categorias', 'CategoryController@index')->name('categorias');
	Route::get('/cursos/categorias/crear', 'CategoryController@crear')->name('categorias.crear');
	Route::post('/cursos/categorias/crear', 'CategoryController@create');
	Route::get('/cursos/categorias/cambiar-estatus/{id}', 'CategoryController@cambiar_estatus')->name('categorias.cambiar-estatus');
	Route::get('/cursos/categorias/editar/{id}', 'CategoryController@editar')->name('categorias.editar');
	Route::post('/cursos/categorias/editar/{id}', 'CategoryController@edit');


	Route::get('/cursos/formatos', 'FormatController@index')->name('formatos');
	Route::get('/cursos/formatos/crear', 'FormatController@crear')->name('formatos.crear');
	Route::post('/cursos/formatos/crear', 'FormatController@create');
	Route::get('/cursos/formatos/cambiar-estatus/{id}', 'FormatController@cambiar_estatus')->name('formatos.cambiar-estatus');
	Route::get('/cursos/formatos/editar/{id}', 'FormatController@editar')->name('formatos.editar');
	Route::post('/cursos/formatos/editar/{id}', 'FormatController@edit');






	Route::get('/cursos', 'CourseController@index')->name('cursos');
	Route::get('/cursos/get-list', 'CourseController@get_list')->name('cursos.get-list');
	Route::get('/cursos/crear', 'CourseController@crear')->name('cursos.crear');
	Route::post('/cursos/crear', 'CourseController@create');

	Route::get('/cursos/traer-estados/{id}', 'CourseController@traer_estados')->where('id', '[0-9]+');


	Route::get('/cursos/editar/{id}', 'CourseController@editar')->name('cursos.editar')->where('id', '[0-9]+');
	Route::post('/cursos/editar/{id}', 'CourseController@edit')->where('id', '[0-9]+');

	Route::get('/cursos/cambiar-estatus/{id}', 'CourseController@cambiar_estatus')->name('cursos.cambiar-estatus')->where('id', '[0-9]+');
	
});