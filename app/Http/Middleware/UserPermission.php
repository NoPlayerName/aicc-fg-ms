<?php

namespace App\Http\Middleware;

use App\Services\Permission\PermissionService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $routeName = $request->route()->getName();
        if(!PermissionService::can(auth()->user(),$routeName, 'can_access')) {
            // Auth::logout();
            // session()->invalidate(); 
            // session()->regenerateToken();
            session()->flash('no_permission', 'You no have permission!');
            return redirect()->route('dashboard');
        }
        return $next($request);
    }
}
