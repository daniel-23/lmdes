<?php
Route::group(['middleware' => ['auth','can:super-admin']], function () {
	#Rutas para gestion de Plantillas
	Route::get('/plantillas', 'TemplateController@index')->name('plantillas');
	Route::get('/plantillas/get-list', 'TemplateController@get_list')->name('plantillas.get-list');
	Route::get('/plantillas/crear', 'TemplateController@crear')->name('plantillas.crear');
	Route::post('/plantillas/crear', 'TemplateController@create');

	Route::get('/plantillas/traer-estados/{id}', 'TemplateController@traer_estados')->where('id', '[0-9]+');


	Route::get('/plantillas/editar/{id}', 'TemplateController@editar')->name('plantillas.editar')->where('id', '[0-9]+');
	Route::post('/plantillas/editar/{id}', 'TemplateController@edit')->where('id', '[0-9]+');

	Route::get('/plantillas/cambiar-estatus/{id}', 'TemplateController@cambiar_estatus')->name('plantillas.cambiar-estatus')->where('id', '[0-9]+');


	Route::get('/plantillas/competencias/{id}', 'TemplateController@competencias')->name('plantillas.competencias')->where('id', '[0-9]+');
	Route::post('/plantillas/competencias/{id}/crear', 'TemplateController@competencias_create')->name('plantillas.competencias.crear')->where('id', '[0-9]+');
	Route::get('/plantillas/competencias/{id}/eliminar/{idp}', 'TemplateController@competencias_delete')->name('plantillas.competencias')->where('id', '[0-9]+');
	
});