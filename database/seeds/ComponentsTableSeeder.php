<?php

use Illuminate\Database\Seeder;
use App\Component;

class ComponentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $componentes = [
            [
                'Name' => 'Login',
                'Description' => 'Component Login',
                'IdComponent1' => 0
            ],
            [
                'Name' => 'Dashboard',
                'Description' => 'Component Dashboard',
                'IdComponent1' => 0
            ],

            [
                'Name' => 'Calendario',
                'Description' => 'Component Calendario',
                'IdComponent1' => 0
            ],
            [
                'Name' => 'Cursos',
                'Description' => 'Component Cursos',
                'IdComponent1' => 0
            ],
            [
                'Name' => 'Profesores',
                'Description' => 'Component Profesores',
                'IdComponent1' => 0
            ],
            [
                'Name' => 'Estudiantes',
                'Description' => 'Component Estudiantes',
                'IdComponent1' => 0
            ],
            [
                'Name' => 'Biblioteca',
                'Description' => 'Component Biblioteca',
                'IdComponent1' => 0
            ],
            [
                'Name' => 'Cartelera',
                'Description' => 'Component Cartelera',
                'IdComponent1' => 0
            ],
            [
                'Name' => 'Parámetros Generales',
                'Description' => 'Component Parámetros Generales',
                'IdComponent1' => 0
            ],
            [
                'Name' => 'Administrar Usuarios',
                'Description' => 'Component Administrar Usuarios',
                'IdComponent1' => 0
            ],
            [
                'Name' => 'Administrar Utilidades',
                'Description' => 'Component Administrar Utilidades',
                'IdComponent1' => 0
            ],
            [
                'Name' => 'Administrar Cursos',
                'Description' => 'Component Administrar Cursos',
                'IdComponent1' => 0
            ],
            [
                'Name' => 'Parámetros Globales',
                'Description' => 'Component Parámetros Globales',
                'IdComponent1' => 0
            ],
            [
                'Name' => 'Seguridad',
                'Description' => 'Component Seguridad',
                'IdComponent1' => 0
            ],
            [
                'Name' => 'Reportes',
                'Description' => 'Component Reportes',
                'IdComponent1' => 0
            ],
            [
                'Name' => 'Compañía',
                'Description' => 'Component Compañía',
                'IdComponent1' => 13
            ],
            [
                'Name' => 'Compañía Usuarios',
                'Description' => 'Component Compañía Usuarios',
                'IdComponent1' => 16
            ],
            [
                'Name' => 'Categorias',
                'Description' => 'Component Dashboard',
                'IdComponent1' => 12
            ],
            [
                'Name' => 'Formatos',
                'Description' => 'Component Formatos',
                'IdComponent1' => 12
            ],
            [
                'Name' => 'Parametros',
                'Description' => 'Component Parametros',
                'IdComponent1' => 12
            ],
            [
                'Name' => 'Idiomas',
                'Description' => 'Component Dashboard',
                'IdComponent1' => 13
            ],
            [
                'Name' => 'Zonas Horarias',
                'Description' => 'Component Dashboard',
                'IdComponent1' => 13
            ],
            [
                'Name' => 'Paises',
                'Description' => 'Component Dashboard',
                'IdComponent1' => 13
            ],
            [
                'Name' => 'Monedas',
                'Description' => 'Component Dashboard',
                'IdComponent1' => 13
            ],


            [
                'Name' => 'Usuarios',
                'Description' => 'Component Usuarios',
                'IdComponent1' => 14
            ],
            [
                'Name' => 'Roles',
                'Description' => 'Component Roles',
                'IdComponent1' => 14
            ],
            [
                'Name' => 'Permisos',
                'Description' => 'Component Permisos',
                'IdComponent1' => 14
            ],
            [
                'Name' => 'Componentes',
                'Description' => 'Component Componentes',
                'IdComponent1' => 14
            ],
            [
                'Name' => 'Aud Usuarios',
                'Description' => 'Component Aud Usuarios',
                'IdComponent1' => 15
            ],
            [
                'Name' => 'Grupos',
                'Description' => 'Component Grupos',
                'IdComponent1' => 12
            ],
            [
                'Name' => 'Insignias',
                'Description' => 'Component Insignias',
                'IdComponent1' => 12
            ],
            [
                'Name' => 'Competencias',
                'Description' => 'Component Competencias',
                'IdComponent1' => 12
            ],
            [
                'Name' => 'Escalas',
                'Description' => 'Component Dashboard',
                'IdComponent1' => 12
            ],
            [
                'Name' => 'Plantillas',
                'Description' => 'Component Dashboard',
                'IdComponent1' => 12
            ],
        ];

        foreach ($componentes as $componente) {
            $component = Component::Create($componente);
        }
    }
}
