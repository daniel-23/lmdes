<?php
Route::group(['middleware' => ['auth']], function () {
	Route::get('/calendario', function () {
		return view('calendario.index');
	});
});