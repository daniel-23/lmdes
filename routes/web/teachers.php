<?php
Route::group(['middleware' => ['auth','can:admin']], function () {
	#Rutas para gestion de Profesores
	Route::get('/profesores', 'TeacherController@index')->name('profesores');
	Route::get('/profesores/crear', 'TeacherController@crear')->name('profesores.crear');
	Route::get('/profesores/get-list', 'TeacherController@get_list')->name('profesores.get-list');
	Route::get('/profesores/editar/{id}', 'TeacherController@editar')->name('profesores.editar');
	Route::post('/profesores/editar-cuenta/{id}', 'TeacherController@edit_account')->middleware('tiene_permiso:Profesores+Editar')->name('profesores.editar.cuenta');
	Route::post('/profesores/editar-adicional/{id}', 'TeacherController@edit_additional')->middleware('tiene_permiso:Profesores+Editar')->name('profesores.editar.adicional');


	Route::post('/profesores/crear', 'TeacherController@create');


	
});
