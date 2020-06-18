<?php
Route::group(['middleware' => ['auth','can:super-admin']], function () {
	#Rutas para gestion de Tipos de Compañia
	Route::get('/company-types', 'CompanyTypeController@index')->name('company-types');
	Route::get('/company-types/create', 'CompanyTypeController@crear')->name('company-types.crear');
	Route::post('/company-types/create', 'CompanyTypeController@create');

	Route::get('/company-types/edit/{id}', 'CompanyTypeController@editar')->name('company-types.editar')->where('id', '[0-9]+');
	Route::post('/company-types/edit/{id}', 'CompanyTypeController@edit')->where('id', '[0-9]+');
});