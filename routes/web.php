<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

#Route::get('/login', 'LoginController@index')->name('login');
#Route::post('/login', 'LoginController@login');

/*
Route::group(['middleware' => ['auth']], function () {
	Route::get('/', 'HomeController@index')->name('home');

	#Rutas para gestion de roles
	Route::get('/roles', 'RoleController@index')->name('roles');
	Route::get('/roles/crear', 'RoleController@crear')->name('roles.crear');
	Route::post('/roles/crear', 'RoleController@create');
	Route::get('/roles/get-list', 'RoleController@get_list')->name('roles.get-list');
	Route::get('/roles/cambiar-estatus/{id}', 'RoleController@cambiar_estatus');
	Route::get('/roles/editar/{id}', 'RoleController@editar')->name('roles.editar');
	Route::post('/roles/editar/{id}', 'RoleController@edit');
	Route::get('/roles/permisos/{id}', 'RoleController@permisos_index')->name('roles.permisos.index');
	Route::get('/roles/permisos/{id}/crear', 'RoleController@permisos_crear')->name('roles.permisos.crear');
	Route::post('/roles/permisos/{id}/crear', 'RoleController@permisos_create');
	Route::get('/roles/permisos/{id}/eliminar/{idp}', 'RoleController@permisos_eliminar');


	#Rutas para gestion de permisos
	Route::get('/permisos', 'PermissionController@index')->name('permisos');
	Route::get('/permisos/crear', 'PermissionController@crear')->name('permisos.crear');
	Route::post('/permisos/crear', 'PermissionController@create');
	Route::get('/permisos/get-list', 'PermissionController@get_list')->name('permisos.get-list');
	Route::get('/permisos/cambiar-estatus/{id}', 'PermissionController@cambiar_estatus');
	Route::get('/permisos/editar/{id}', 'PermissionController@editar')->name('permisos.editar');
	Route::post('/permisos/editar/{id}', 'PermissionController@edit');


	#Rutas para gestion de componentes
	Route::get('/componentes', 'ComponentController@index')->name('componentes');
	Route::get('/componentes/crear', 'ComponentController@crear')->name('componentes.crear');
	Route::post('/componentes/crear', 'ComponentController@create');
	Route::get('/componentes/get-list', 'ComponentController@get_list')->name('componentes.get-list');
	Route::get('/componentes/cambiar-estatus/{id}', 'ComponentController@cambiar_estatus');
	Route::get('/componentes/editar/{id}', 'ComponentController@editar')->name('componentes.editar');
	Route::post('/componentes/editar/{id}', 'ComponentController@edit');
	
	#Rutas para gestion de usuarios
	Route::get('/usuarios', 'UserController@index')->name('usuarios');
	Route::get('/usuarios/crear', 'UserController@crear')->name('usuarios.crear');
	Route::post('/usuarios/crear', 'UserController@create');
	Route::get('/usuarios/get-list', 'UserController@get_list')->name('usuarios.get-list');
	Route::get('/usuarios/cambiar-estatus/{id}', 'UserController@cambiar_estatus');
	Route::get('/usuarios/editar/{id}', 'UserController@editar')->name('usuarios.editar');
	Route::post('/usuarios/editar/{id}', 'UserController@edit');
	Route::get('/usuarios/parametros', 'UserController@parametros')->name('usuarios.parametros');
	Route::post('/usuarios/parametros', 'UserController@paramaters');
	Route::get('/usuarios/auditoria', 'UserController@auditoria')->name('usuarios.auditoria');
	Route::get('/usuarios/get-auditoria', 'UserController@get_auditoria')->name('usuarios.get-audt');



	#Rutas para gestion de AUD Eventos
	Route::get('/aud-eventos', 'AudEventController@index')->name('audEventos');
	Route::get('/aud-eventos/crear', 'AudEventController@crear')->name('audEventos.crear');
	Route::post('/aud-eventos/crear', 'AudEventController@create');
	Route::get('/aud-eventos/editar/{id}', 'AudEventController@editar')->name('audEventos.editar');
	Route::post('/aud-eventos/editar/{id}', 'AudEventController@edit');

	






	Route::post('/logout', 'LoginController@logout')->name('logout');
});

*/