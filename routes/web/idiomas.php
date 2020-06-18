<?php
Route::group(['middleware' => ['auth','can:super-admin']], function () {
	#Rutas para gestion de idiomas
	Route::get('/idiomas', 'LanguageController@index')->name('idiomas');
	Route::get('/idiomas/crear', 'LanguageController@crear')->name('idiomas.crear');
	Route::post('/idiomas/crear', 'LanguageController@create');

	Route::get('/idiomas/editar/{id}', 'LanguageController@editar')->name('idiomas.editar')->where('id', '[0-9]+');
	Route::post('/idiomas/editar/{id}', 'LanguageController@edit')->where('id', '[0-9]+');
});