<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $roles): Response
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login')->withErrors(['access' => 'Vous devez être connecté pour accéder à cette page.']);
        }

        // Charger le rôle de l'utilisateur à partir de la relation avec la table `role`
        $userRole = $user->role->nom_role ?? null;

        if (!$userRole) {
            return redirect()->route('login')->withErrors(['access' => 'Rôle utilisateur non trouvé.']);
        }

        // Transformer la chaîne de rôles en tableau
        $rolesArray = explode('|', $roles);

        // Vérifier si l'utilisateur a un rôle qui correspond
        if (!in_array($userRole, $rolesArray)) {
            return redirect()->route('login')->withErrors(['access' => 'Vous n\'avez pas l\'autorisation d\'accéder à cette page.']);
        }

        return $next($request);
    }
}