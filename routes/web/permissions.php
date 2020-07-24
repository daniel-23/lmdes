<?php
Route::group(['middleware' => ['auth']], function () {

	#Rutas para gestion de permisos
	Route::get('/permisos', 'PermissionController@index')->name('permisos')->middleware('tiene_permiso:Permisos+Acceder');
	Route::get('/permisos/crear', 'PermissionController@crear')->name('permisos.crear')->middleware('tiene_permiso:Permisos+Crear');
	Route::post('/permisos/crear', 'PermissionController@create')->middleware('tiene_permiso:Permisos+Crear');
	Route::get('/permisos/get-list', 'PermissionController@get_list')->name('permisos.get-list')->middleware('tiene_permiso:Permisos+Acceder');
	Route::get('/permisos/cambiar-estatus/{id}', 'PermissionController@cambiar_estatus')->where('id', '[0-9]+')->middleware('tiene_permiso:Permisos+Cambiar Estado');
	Route::get('/permisos/editar/{id}', 'PermissionController@editar')->name('permisos.editar')->where('id', '[0-9]+')->middleware('tiene_permiso:Permisos+Editar');
	Route::post('/permisos/editar/{id}', 'PermissionController@edit')->where('id', '[0-9]+')->middleware('tiene_permiso:Permisos+Editar');
});