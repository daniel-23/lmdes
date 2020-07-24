<?php

namespace App\Http\Middleware;

use Closure;

class TienePermiso
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$CompPerm)
    {

        list($componente,$permiso) = explode('+', $CompPerm);

        $component = \App\Component::where('Name',$componente)->first();

        $permission = \App\Permission::where('Name',$permiso)->first();


        if (is_null($component) || is_null($permission)) {
            return abort('403');
        }

        foreach ($request->user()->roles as $role) {
            if (!is_null($role->permissions()->where('Sec_Permissions.IdPermission',$permission->IdPermission)->wherePivot('IdComponent',$component->IdComponent)->first())) {
                return $next($request);
            }
        }
        return abort('403');
        
    }
}
