<?php
Route::group(['middleware' => ['auth']], function () {
	#Rutas para gestion de grupos
	Route::get('/grupos', 'GroupController@index')->name('grupos')->middleware('tiene_permiso:Grupos+Acceder');
	#Route::get('/grupos/crear', 'GroupController@crear')->name('grupos.crear');
	Route::post('/grupos/crear', 'GroupController@create')->name('grupos.crear')->middleware('tiene_permiso:Grupos+Crear');
	Route::get('/grupos/get-list', 'GroupController@get_list')->name('grupos.get-list')->middleware('tiene_permiso:Grupos+Acceder');
	#Route::get('/grupos/cambiar-estatus/{id}', 'GroupController@cambiar_estatus')->where('id', '[0-9]+');
	#Route::get('/grupos/editar/{id}', 'GroupController@editar')->name('grupos.editar')->where('id', '[0-9]+');
	Route::post('/grupos/editar/{id}', 'GroupController@edit')->where('id', '[0-9]+')->name('grupos.editar')->middleware('tiene_permiso:Grupos+Editar');
	
	Route::get('/grupos/cursos/{id}', 'GroupController@grupos_cursos')->name('grupos.cursos');
	Route::post('/grupos/cursos/{id}', 'GroupController@groups_courses')->name('grupos.cursos');
	Route::get('/grupos/cursos/{id}/eliminar/{idp}', 'GroupController@grupos_cursos_eliminar')->name('grupos.cursos.eliminar');

	Route::get('/grupos/get-name/{name}', 'GroupController@grupos_get_name');
});