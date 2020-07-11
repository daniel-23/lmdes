<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('tiene-permiso', function ($user,$CompPerm) {
            
            list($componente,$permiso) = explode('+', $CompPerm);

            $component = \App\Component::where('Name',$componente)->first();

            $permission = \App\Permission::where('Name',$permiso)->first();


            if (is_null($component) || is_null($permission)) {
                return false;
            }




            foreach ($user->roles as $role) {
                if (!is_null($role->permissions()->where('Sec_Permissions.IdPermission',$permission->IdPermission)->wherePivot('IdComponent',$component->IdComponent)->first())) {
                    return true;
                }
            }
            return false;
        });



        Gate::define('dashboard', function ($user) {
            foreach ($user->roles as $role) {
                $componente = $role->components()->where('name','Dashboard')->first();
                if (!is_null($componente)) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('calendario', function ($user) {
            foreach ($user->roles as $role) {
                $componente = $role->components()->where('name','Calendario')->first();
                if (!is_null($componente)) {
                    return true;
                }
            }
            return false;
        });


        Gate::define('cursos', function ($user) {
            foreach ($user->roles as $role) {
                $componente = $role->components()->where('name','Cursos')->first();
                if (!is_null($componente)) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('profesores', function ($user) {
            foreach ($user->roles as $role) {
                $componente = $role->components()->where('name','Profesores')->first();
                if (!is_null($componente)) {
                    return true;
                }
            }
            return false;
        });


        Gate::define('estudiantes', function ($user) {
            foreach ($user->roles as $role) {
                $componente = $role->components()->where('name','Estudiantes')->first();
                if (!is_null($componente)) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('biblioteca', function ($user) {
            foreach ($user->roles as $role) {
                $componente = $role->components()->where('name','Biblioteca')->first();
                if (!is_null($componente)) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('companies-users', function ($user) {
            foreach ($user->roles as $role) {
                $componente = $role->components()->where('name','Compañía Usuarios')->first();
                if (!is_null($componente)) {
                    return true;
                }
            }
            return false;
        });

        Gate::define('super-admin', function ($user) {

            foreach ($user->roles as $role) {
                if ($role->IdRole == 1) {
                    return True;
                }
            }
            return False;
        });

        Gate::define('admin', function ($user) {

            foreach ($user->roles as $role) {
                if ($role->IdRole == 2) {
                    return True;
                }
            }
            return False;
        });

    }
}
