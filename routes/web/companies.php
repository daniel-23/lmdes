<?php
Route::group(['middleware' => ['auth','can:super-admin']], function () {
	#Rutas para gestion de Compañias
	Route::get('/companies', 'CompanyController@index')->name('companies');
	Route::get('/companies/get-list', 'CompanyController@get_list')->name('companies.get-list');
	Route::get('/companies/crear', 'CompanyController@crear')->name('companies.crear');
	Route::post('/companies/crear', 'CompanyController@create');

	Route::get('/companies/traer-estados/{id}', 'CompanyController@traer_estados')->where('id', '[0-9]+');


	Route::get('/companies/editar/{id}', 'CompanyController@editar')->name('companies.editar')->where('id', '[0-9]+');
	Route::post('/companies/editar/{id}', 'CompanyController@edit')->where('id', '[0-9]+');

	Route::get('/companies/cambiar-estatus/{id}', 'CompanyController@cambiar_estatus')->name('companies.cambiar-estatus')->where('id', '[0-9]+');


	Route::get('/companies/regional/{id}', 'CompanyController@regional_index')->name('companies.regional')->where('id', '[0-9]+');
	Route::get('/companies/regional/{id}/crear', 'CompanyController@regional_crear')->name('companies.regional.crear')->where('id', '[0-9]+');
	Route::post('/companies/regional/{id}/crear', 'CompanyController@regional_create')->where('id', '[0-9]+');

	Route::get('/companies/regional/eliminar/{id}', 'CompanyController@regional_delete')->where('id', '[0-9]+');
});


Route::group(['middleware' => ['auth']], function () {
	Route::get('/companies/{id}/users', 'CompanyController@users')->where('id', '[0-9]+')->middleware('can:companies-users')->name('companies.users');

	Route::get('/companies/{id}/users/create', 'CompanyController@users_crear')->where('id', '[0-9]+')->middleware('can:companies-users')->name('companies.users.create');
	Route::post('/companies/{id}/users/create', 'CompanyController@users_create')->where('id', '[0-9]+')->middleware('can:companies-users')->name('companies.users.create');
	Route::get('/companies/{id}/users/get-list', 'CompanyController@users_get_list')->where('id', '[0-9]+')->middleware('can:companies-users')->name('company.users.get-list');

	Route::get('/companies/parameters/{id}', 'CompanyController@parametros')->where('id', '[0-9]+');
	Route::post('/companies/parameters/{id}', 'CompanyController@parameters')->where('id', '[0-9]+');
});

	



