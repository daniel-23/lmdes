<?php
Route::group(['middleware' => ['auth','can:super-admin']], function () {
	#Rutas para gestion de grupos
	Route::get('/grupos', 'GroupController@index')->name('grupos');
	Route::get('/grupos/crear', 'GroupController@crear')->name('grupos.crear');
	Route::post('/grupos/crear', 'GroupController@create');
	Route::get('/grupos/get-list', 'GroupController@get_list')->name('grupos.get-list');
	Route::get('/grupos/cambiar-estatus/{id}', 'GroupController@cambiar_estatus')->where('id', '[0-9]+');
	Route::get('/grupos/editar/{id}', 'GroupController@editar')->name('grupos.editar')->where('id', '[0-9]+');
	Route::post('/grupos/editar/{id}', 'GroupController@edit')->where('id', '[0-9]+');
	
	Route::get('/grupos/cursos/{id}', 'GroupController@grupos_cursos')->name('grupos.cursos');
	Route::post('/grupos/cursos/{id}', 'GroupController@groups_courses')->name('grupos.cursos');
	Route::get('/grupos/cursos/{id}/eliminar/{idp}', 'GroupController@grupos_cursos_eliminar')->name('grupos.cursos.eliminar');
});