<?php
Route::group(['middleware' => ['auth']], function () {
	#Rutas para gestion de Insignias
	Route::get('/badges', 'BadgeController@index')->name('badges')->middleware('tiene_permiso:Insignias+Acceder');
	Route::get('/badges/change-status/{id}', 'BadgeController@change_status')->name('badges.cambiar_estatus')->middleware('tiene_permiso:Insignias+Cambiar Estado');


	Route::post('/badges', 'BadgeController@create')->name('badges.create')->middleware('tiene_permiso:Insignias+Crear');
	Route::post('/badges/edit/{id}', 'BadgeController@edit')->name('badges.update')->middleware('tiene_permiso:Insignias+Editar');
	
});