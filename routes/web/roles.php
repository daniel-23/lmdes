<?php
Route::group(['middleware' => ['auth','can:super-admin']], function () {
	#Rutas para gestion de roles
	Route::get('/roles', 'RoleController@index')->name('roles');
	Route::get('/roles/crear', 'RoleController@crear')->name('roles.crear');
	Route::post('/roles/crear', 'RoleController@create');
	Route::get('/roles/get-list', 'RoleController@get_list')->name('roles.get-list');
	Route::get('/roles/cambiar-estatus/{id}', 'RoleController@cambiar_estatus')->where('id', '[0-9]+');
	Route::get('/roles/editar/{id}', 'RoleController@editar')->name('roles.editar')->where('id', '[0-9]+');
	Route::post('/roles/editar/{id}', 'RoleController@edit')->where('id', '[0-9]+');
	Route::get('/roles/permisos/{id}', 'RoleController@permisos_index')->name('roles.permisos.index')->where('id', '[0-9]+');
	Route::get('/roles/permisos/{id}/crear', 'RoleController@permisos_crear')->name('roles.permisos.crear')->where('id', '[0-9]+');
	Route::post('/roles/permisos/{id}/crear', 'RoleController@permisos_create')->where('id', '[0-9]+');
	Route::get('/roles/permisos/{id}/eliminar/{idp}', 'RoleController@permisos_eliminar')->where('id', '[0-9]+')->where('idp', '[0-9]+');
});