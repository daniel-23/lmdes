<?php
Route::group(['middleware' => ['auth','can:super-admin']], function () {

	#Rutas para gestion de permisos
	Route::get('/permisos', 'PermissionController@index')->name('permisos');
	Route::get('/permisos/crear', 'PermissionController@crear')->name('permisos.crear');
	Route::post('/permisos/crear', 'PermissionController@create');
	Route::get('/permisos/get-list', 'PermissionController@get_list')->name('permisos.get-list');
	Route::get('/permisos/cambiar-estatus/{id}', 'PermissionController@cambiar_estatus')->where('id', '[0-9]+');
	Route::get('/permisos/editar/{id}', 'PermissionController@editar')->name('permisos.editar')->where('id', '[0-9]+');
	Route::post('/permisos/editar/{id}', 'PermissionController@edit')->where('id', '[0-9]+');
});