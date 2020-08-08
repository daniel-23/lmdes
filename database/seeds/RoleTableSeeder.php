<?php

use Illuminate\Database\Seeder;
use App\{Role, Permission, Component};
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$roles = [
    		'Super Administrador',
    		'Administrador',
    		'Profesor',
    		'Acudiente',
    		'Estudiante',
    	];
    	foreach ($roles as $rol) {
    		$role = Role::create(['name' => $rol]);
            if ($role->IdRole == 1) {
                $componentes = Component::all();
                $permisos = Permission::all();
                foreach ($componentes as $componente) {
                    foreach ($permisos as $permiso) {
                        $role->permissions()->attach($permiso->IdPermission, ['IdComponent' => $componente->IdComponent]);
                    }
                }
            }
    	}
    }
}
