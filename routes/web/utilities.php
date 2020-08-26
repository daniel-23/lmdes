<?php
Route::group(['middleware' => ['auth']], function () {
	Route::get('/utilidades/foros/{id}', 'UtilitiesController@foros')->where('id', '[0-9]+')->name('foros.show');

	Route::post('/utilidades/agregar/{id}', 'UtilitiesController@agregar')->where('id', '[0-9]+')->name('utilidades.agregar');
	Route::post('/utilidades/agregar-foro/{id}', 'UtilitiesController@agregar_foro')->where('id', '[0-9]+')->name('utilidades.agregar-foro');
	Route::post('/utilidades/foros/agregar-comentario/{id}', 'UtilitiesController@agregar_comentario_foro')->where('id', '[0-9]+')->name('foros.agregar.comentario');
});

	



