<?php
Route::group(['middleware' => ['auth','can:super-admin']], function () {
	
	#Rutas para gestion de usuarios
	Route::get('/usuarios', 'UserController@index')->name('usuarios');
	Route::get('/usuarios/crear', 'UserController@crear')->name('usuarios.crear');
	Route::post('/usuarios/crear', 'UserController@create');
	Route::get('/usuarios/get-list', 'UserController@get_list')->name('usuarios.get-list');
	Route::get('/usuarios/cambiar-estatus/{id}', 'UserController@cambiar_estatus')->where('id', '[0-9]+');
	Route::get('/usuarios/editar/{id}', 'UserController@editar')->name('usuarios.editar')->where('id', '[0-9]+');
	Route::post('/usuarios/editar/{id}', 'UserController@edit')->where('id', '[0-9]+');
	Route::get('/usuarios/parametros', 'UserController@parametros')->name('usuarios.parametros');
	Route::post('/usuarios/parametros', 'UserController@parameters');
	Route::get('/usuarios/auditoria', 'UserController@auditoria')->name('usuarios.auditoria');
	Route::get('/usuarios/get-auditoria', 'UserController@get_auditoria')->name('usuarios.get-audt');


});