<?php
Route::group(['middleware' => ['auth']], function () {
	#Rutas para gestion de Insignias
	Route::get('/badges', 'BadgeController@index')->name('badges');


	Route::post('/badges', 'BadgeController@create')->name('badges.create');
	Route::post('/badges/edit/{id}', 'BadgeController@edit')->name('badges.update');
	
});