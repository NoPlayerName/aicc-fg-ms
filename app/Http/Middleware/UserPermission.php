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
        $user = Auth::user();
        $routeName = $request->route()->getName();
        if ($user) {
            if ($request->expectsJson() || $request->ajax()) {
                return $next($request);
            }
        }
        if (!PermissionService::can($user, $routeName, 'can_access')) {
            session()->flash('no_permission', 'You no have permission!');
            return redirect()->route('dashboard');
        }
        return $next($request);
    }
}
