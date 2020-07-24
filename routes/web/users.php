<?php
Route::group(['middleware' => ['auth','can:super-admin']], function () {
	
	#Rutas para gestion de usuarios
	Route::get('/usuarios', 'UserController@index')->name('usuarios')->middleware('tiene_permiso:Usuarios+Acceder');
	Route::get('/usuarios/crear', 'UserController@crear')->name('usuarios.crear')->middleware('tiene_permiso:Usuarios+Crear');
	Route::post('/usuarios/crear', 'UserController@create')->middleware('tiene_permiso:Usuarios+Crear');

	Route::get('/usuarios/get-list', 'UserController@get_list')->name('usuarios.get-list')->middleware('tiene_permiso:Usuarios+Acceder');

	Route::get('/usuarios/cambiar-estatus/{id}', 'UserController@cambiar_estatus')->where('id', '[0-9]+')->middleware('tiene_permiso:Usuarios+Cambiar Estado');
	Route::get('/usuarios/editar/{id}', 'UserController@editar')->name('usuarios.editar')->where('id', '[0-9]+')->middleware('tiene_permiso:Usuarios+Editar');
	Route::post('/usuarios/editar/{id}', 'UserController@edit')->where('id', '[0-9]+')->middleware('tiene_permiso:Usuarios+Editar');
	Route::get('/usuarios/parametros', 'UserController@parametros')->name('usuarios.parametros');
	Route::post('/usuarios/parametros', 'UserController@parameters');
	Route::get('/usuarios/auditoria', 'UserController@auditoria')->name('usuarios.auditoria');
	Route::get('/usuarios/get-auditoria', 'UserController@get_auditoria')->name('usuarios.get-audt');
	Route::get('/companies/{idCompany}/users/editar/{idUser}', 'UserController@editar_usuario_compania')->where('idCompany', '[0-9]+')->where('idUser', '[0-9]+');
});