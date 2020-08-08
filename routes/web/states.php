<?php
Route::group(['middleware' => ['auth','can:super-admin']], function () {
	#Rutas para gestion de Estados
	Route::get('/estados', 'StateController@index')->name('estados');
	Route::get('/estados/crear', 'StateController@crear')->name('estados.crear');
	Route::post('/estados/crear', 'StateController@create');

	Route::get('/estados/editar/{id}', 'StateController@editar')->name('estados.editar')->where('id', '[0-9]+');
	Route::post('/estados/editar/{id}', 'StateController@edit')->where('id', '[0-9]+');

	Route::get('/estados/cambiar-estatus/{id}', 'StateController@cambiar_estatus')->name('estados.cambiar-estatus')->where('id', '[0-9]+');
	Route::get('/estados/get-pais/{id}', 'StateController@get_states_country')->where('id', '[0-9]+');
	
});