<?php
Route::group(['middleware' => ['auth']], function () {
	#Rutas para gestion de Estudiantes
	Route::get('/estudiantes', 'StudentController@index')->name('estudiantes')->middleware('tiene_permiso:Estudiantes+Acceder');
	Route::get('/estudiantes/crear', 'StudentController@crear')->name('estudiantes.crear')->middleware('tiene_permiso:Estudiantes+Crear');
	Route::get('/estudiantes/editar/{id}', 'StudentController@editar')->name('estudiantes.editar')->middleware('tiene_permiso:Estudiantes+Editar');

	Route::get('/estudiantes/get-list', 'StudentController@get_list')->name('estudiantes.get-list')->middleware('tiene_permiso:Estudiantes+Acceder');
	Route::get('/estudiantes/perfil/{id}', 'StudentController@perfil')->name('estudiantes.perfil')->middleware('tiene_permiso:Estudiantes+Acceder');

	
	Route::post('/estudiantes/crear', 'StudentController@create')->middleware('tiene_permiso:Estudiantes+Crear');
	Route::post('/estudiantes/editar/{id}', 'StudentController@edit')->middleware('tiene_permiso:Estudiantes+Editar');
	Route::post('/estudiantes/editar-cuenta/{id}', 'StudentController@edit_account')->middleware('tiene_permiso:Estudiantes+Editar')->name('estudiantes.editar.cuenta');
	Route::post('/estudiantes/editar-adicional/{id}', 'StudentController@edit_additional')->middleware('tiene_permiso:Estudiantes+Editar')->name('estudiantes.editar.adicional');
	Route::post('/estudiantes/editar-health/{id}', 'StudentController@edit_health')->middleware('tiene_permiso:Estudiantes+Editar')->name('estudiantes.editar.health');
});