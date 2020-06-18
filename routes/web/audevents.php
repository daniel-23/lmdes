<?php
Route::group(['middleware' => ['auth','can:super-admin']], function () {
	#Rutas para gestion de AUD Eventos
	Route::get('/aud-eventos', 'AudEventController@index')->name('audEventos');
	Route::get('/aud-eventos/crear', 'AudEventController@crear')->name('audEventos.crear');
	Route::post('/aud-eventos/crear', 'AudEventController@create');
	Route::get('/aud-eventos/editar/{id}', 'AudEventController@editar')->name('audEventos.editar')->where('id', '[0-9]+');
	Route::post('/aud-eventos/editar/{id}', 'AudEventController@edit')->where('id', '[0-9]+');
});