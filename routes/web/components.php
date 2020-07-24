<?php

Route::group(['middleware' => ['auth','can:super-admin']], function () {
	#Rutas para gestion de componentes
	Route::get('/componentes', 'ComponentController@index')->name('componentes')->middleware('tiene_permiso:Componentes+Acceder');
	Route::get('/componentes/crear', 'ComponentController@crear')->name('componentes.crear')->middleware('tiene_permiso:Componentes+Crear');
	Route::post('/componentes/crear', 'ComponentController@create')->middleware('tiene_permiso:Componentes+Crear');
	Route::get('/componentes/get-list', 'ComponentController@get_list')->name('componentes.get-list')->middleware('tiene_permiso:Componentes+Acceder');
	Route::get('/componentes/cambiar-estatus/{id}', 'ComponentController@cambiar_estatus')->where('id', '[0-9]+')->middleware('tiene_permiso:Componentes+Cambiar Estado');
	Route::get('/componentes/editar/{id}', 'ComponentController@editar')->name('componentes.editar')->where('id', '[0-9]+')->middleware('tiene_permiso:Componentes+Editar');
	Route::post('/componentes/editar/{id}', 'ComponentController@edit')->where('id', '[0-9]+')->middleware('tiene_permiso:Componentes+Editar');
});