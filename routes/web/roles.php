<?php
Route::group(['middleware' => ['auth']], function () {
	#Rutas para gestion de roles
	Route::get('/roles', 'RoleController@index')->name('roles')->middleware('tiene_permiso:Roles+Acceder');
	Route::get('/roles/crear', 'RoleController@crear')->name('roles.crear')->middleware('tiene_permiso:Roles+Crear');
	Route::post('/roles/crear', 'RoleController@create')->middleware('tiene_permiso:Roles+Crear');
	Route::get('/roles/get-list', 'RoleController@get_list')->name('roles.get-list')->middleware('tiene_permiso:Roles+Acceder');

	Route::get('/roles/cambiar-estatus/{id}', 'RoleController@cambiar_estatus')->where('id', '[0-9]+')->middleware('tiene_permiso:Roles+Cambiar Estado');
	Route::get('/roles/editar/{id}', 'RoleController@editar')->name('roles.editar')->where('id', '[0-9]+')->middleware('tiene_permiso:Roles+Editar');
	Route::post('/roles/editar/{id}', 'RoleController@edit')->where('id', '[0-9]+')->middleware('tiene_permiso:Roles+Editar');
});