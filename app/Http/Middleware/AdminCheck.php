<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ( auth()->check() && auth()->user()->is_admin){
            return $next($request);
        }

        abort(403,'Espace pour Admins uniquement. Veuillez vous connecter en tant qu\'admin pour y accéder');
        
    }
}
