<?php

use Illuminate\Database\Seeder;
use App\Permission;
class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permisos = [
        	'Crear',
        	'Acceder',
        	'Consultar',
        	'Editar',
        	'Cambiar Estado',
        ];

        foreach ($permisos as $permiso) {
        	Permission::create(['Name' => $permiso]);
        }
    }
}
