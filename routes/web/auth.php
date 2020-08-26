<?php



Route::get('/{company?}/login', 'LoginController@index')->name('login');
Route::get('/login', 'LoginController@index')->name('login');

#Route::get('/login/{company?}', 'LoginController@index')->name('login');
Route::get('/reset-password', 'LoginController@reset_password')->name('reset.password');


Route::post('/login', 'LoginController@login');
Route::post('/reset-password', 'LoginController@post_reset_password');
Route::get('/reset-password/{key}', 'LoginController@key_reset_password')->name('recuperar.password');
Route::post('/reset-password/{key}', 'LoginController@post_key_reset_password');


Route::get('/ip', function () {
    return view('ip');
});