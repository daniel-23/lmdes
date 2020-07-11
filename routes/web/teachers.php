<?php
Route::group(['middleware' => ['auth','can:admin']], function () {
	#Rutas para gestion de Profesores
	Route::get('/profesores', 'TeacherController@index')->name('profesores');
	Route::get('/profesores/crear', 'TeacherController@crear')->name('profesores.crear');
	Route::get('/profesores/get-list', 'TeacherController@get_list')->name('profesores.get-list');
	/*Route::get('/companies/get-list', 'CompanyController@get_list')->name('companies.get-list');
	Route::get('/companies/crear', 'CompanyController@crear')->name('companies.crear');
	Route::post('/companies/crear', 'CompanyController@create');

	Route::get('/companies/traer-estados/{id}', 'CompanyController@traer_estados')->where('id', '[0-9]+');*/


	Route::post('/profesores/crear', 'TeacherController@create');


	
});
