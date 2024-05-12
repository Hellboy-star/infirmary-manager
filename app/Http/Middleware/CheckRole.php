<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, $role)
{
    // Vérifiez si l'utilisateur est authentifié
    if (Auth::check()) {
        // Obtenez l'utilisateur actuellement authentifié
        $user = Auth::user();

        // Utilisez la logique appropriée pour vérifier le rôle de l'utilisateur
        if ($user->isAdmin && $role === 'Administrateur') {
            return $next($request);
        } elseif ($user->isDir && $role === 'Medecin') {
            return $next($request);
        } elseif ($user->isAssis && $role === 'Assistant') {
            return $next($request)-> isRedirect('/assistant');
        }
    }

    return redirect('/'); // Redirigez l'utilisateur vers une page d'accueil par exemple.
}

    
}
