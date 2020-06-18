<?php
Route::group(['middleware' => ['auth','can:super-admin']], function () {
	#Rutas para gestion de Monedas
	Route::get('/monedas', 'CurrencyController@index')->name('monedas');
	Route::get('/monedas/crear', 'CurrencyController@crear')->name('monedas.crear');
	Route::post('/monedas/crear', 'CurrencyController@create');

	Route::get('/monedas/editar/{id}', 'CurrencyController@editar')->name('monedas.editar')->where('id', '[0-9]+');
	Route::post('/monedas/editar/{id}', 'CurrencyController@edit')->where('id', '[0-9]+');
});