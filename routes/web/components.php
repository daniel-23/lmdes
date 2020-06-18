<?php

Route::group(['middleware' => ['auth','can:super-admin']], function () {
	#Rutas para gestion de componentes
	Route::get('/componentes', 'ComponentController@index')->name('componentes');
	Route::get('/componentes/crear', 'ComponentController@crear')->name('componentes.crear');
	Route::post('/componentes/crear', 'ComponentController@create');
	Route::get('/componentes/get-list', 'ComponentController@get_list')->name('componentes.get-list');
	Route::get('/componentes/cambiar-estatus/{id}', 'ComponentController@cambiar_estatus')->where('id', '[0-9]+');
	Route::get('/componentes/editar/{id}', 'ComponentController@editar')->name('componentes.editar')->where('id', '[0-9]+');
	Route::post('/componentes/editar/{id}', 'ComponentController@edit')->where('id', '[0-9]+');
});