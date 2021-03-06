<?php
Route::group(['middleware' => ['auth']], function () {
	#Rutas para gestion de Cursos
	
	/*CATEGORIAS*/
	Route::get('/cursos/categorias/arbol', 'CategoryController@arbol')->name('categorias.arbol');
	Route::get('/cursos/categorias/get-name/{name}', 'CategoryController@get_for_name');



	Route::get('/cursos/categorias', 'CategoryController@index')->name('categorias')->middleware('tiene_permiso:Categorias+Acceder');
	#Route::get('/cursos/categorias/crear', 'CategoryController@crear')->name('categorias.crear');
	Route::post('/cursos/categorias/crear', 'CategoryController@create')->name('categorias.crear')->middleware('tiene_permiso:Categorias+Crear');
	#Route::get('/cursos/categorias/cambiar-estatus/{id}', 'CategoryController@cambiar_estatus')->name('categorias.cambiar-estatus');
	#Route::get('/cursos/categorias/editar/{id}', 'CategoryController@editar')->name('categorias.editar');
	Route::post('/cursos/categorias/editar/{id}', 'CategoryController@edit')->name('categorias.editar')->middleware('tiene_permiso:Categorias+Editar');
	/*******************/

	/*FORMATOS*/
	Route::get('/cursos/formatos', 'FormatController@index')->name('formatos')->middleware('tiene_permiso:Formatos+Acceder');
	Route::get('/cursos/formatos/crear', 'FormatController@crear')->name('formatos.crear')->middleware('tiene_permiso:Formatos+Crear');
	Route::post('/cursos/formatos/crear', 'FormatController@create')->middleware('tiene_permiso:Formatos+Crear');
	Route::get('/cursos/formatos/cambiar-estatus/{id}', 'FormatController@cambiar_estatus')->name('formatos.cambiar-estatus')->middleware('tiene_permiso:Formatos+Cambiar Estado');
	Route::get('/cursos/formatos/editar/{id}', 'FormatController@editar')->name('formatos.editar')->middleware('tiene_permiso:Formatos+Editar');
	Route::post('/cursos/formatos/editar/{id}', 'FormatController@edit')->middleware('tiene_permiso:Formatos+Editar');
	/**************************/

	/*PARAMETROS*/
	Route::get('/par-courses', 'ParameterController@get_courses')->name('par-courses');
	Route::post('/par-courses', 'ParameterController@post_courses');
	/**************************/

	Route::get('/cursos', 'CourseController@index')->name('cursos')->middleware('tiene_permiso:Cursos+Acceder');
	Route::get('/cursos/get-list', 'CourseController@get_list')->name('cursos.get-list')->middleware('tiene_permiso:Cursos+Acceder');
	Route::get('/cursos/crear', 'CourseController@crear')->name('cursos.crear')->middleware('tiene_permiso:Cursos+Crear');
	Route::post('/cursos/crear', 'CourseController@create')->middleware('tiene_permiso:Cursos+Crear');
	Route::get('/cursos/traer-estados/{id}', 'CourseController@traer_estados')->where('id', '[0-9]+');
	Route::get('/cursos/editar/{id}', 'CourseController@editar')->name('cursos.editar')->where('id', '[0-9]+')->middleware('tiene_permiso:Cursos+Editar');
	Route::post('/cursos/editar/{id}', 'CourseController@edit')->where('id', '[0-9]+')->middleware('tiene_permiso:Cursos+Editar');
	Route::get('/cursos/cambiar-estatus/{id}', 'CourseController@cambiar_estatus')->name('cursos.cambiar-estatus')->where('id', '[0-9]+')->middleware('tiene_permiso:Cursos+Cambiar Estado');
	Route::get('/cursos/{id}', 'CourseController@course_info')->name('cursos.info')->where('id', '[0-9]+')->middleware('tiene_permiso:Cursos+Consultar');
	
	
});