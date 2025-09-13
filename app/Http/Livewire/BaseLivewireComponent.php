<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\Permission\PermissionService;
use Illuminate\Support\Facades\Auth;

abstract class BaseLivewireComponent extends Component
{
    /**
     * Route atau identifier menu untuk permission.
     * Bisa di-override manual di child component.
     */
    protected string $routeName = '';

    /**
     * Mount base permission.
     */
    public function mountBase()
    {
        // Ambil route name dari current route kalau tidak di-set manual
        if (!$this->routeName) {
            $this->routeName = $this->getRouteNameFromRequest();
        }

        // Batasi akses view halaman
        $this->authorizeMethod('can_access');
    }

    /**
     * Ambil route name dari request.
     */
    protected function getRouteNameFromRequest(): string
    {
        $route = request()->route();
        return $route ? $route->getName() : '';
    }

    /**
     * Cek permission
     */
    public function can( string $access = 'can_access'): bool
    {
        $user = Auth::user();
        if (!$user || !$this->routeName) return false;

        return PermissionService::can($user, $this->routeName, $access);
    }
    public function canView(string $route,  string $access = 'can_access'): bool
    {
        $user = Auth::user();
        if (!$user) return false;

        return PermissionService::can($user, $route, $access);
    }

    /**
     * Batasi eksekusi method
     */
    protected function authorizeMethod(string $access = 'can_access')
    {
        if (! $this->can($access)) {
            abort(403, 'Unauthorized action.');
        }
    }
}
