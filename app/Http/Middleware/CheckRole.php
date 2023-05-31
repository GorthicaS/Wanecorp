<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
            // Ajouter un message de débogage ici
            \Log::info('Entering CheckRole middleware');
            
        if (!auth()->check()) {
            return redirect()->route('login');
        }
    
        if (auth()->user()->roles->isEmpty()) {
            return redirect()->route('dashboard')->withErrors(['error' => 'User role not found']);
        }
    
        $userRoleNames = auth()->user()->roles->pluck('name')->toArray();
    
        $hasAllowedRole = false;
        foreach ($userRoleNames as $userRoleName) {
            if (in_array($userRoleName, $roles)) {
                $hasAllowedRole = true;
                break;
            }
        }
    
        if (!$hasAllowedRole) {
            return redirect()->route('dashboard.route');
        }

        return $next($request);
    }
}
