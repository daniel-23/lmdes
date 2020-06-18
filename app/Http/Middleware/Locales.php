<?php

namespace App\Http\Middleware;

use Closure;



class Locales
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $language = session()->get('language') ?? 'es';
        app()->setLocale($language);
        return $next($request);
    }
}
