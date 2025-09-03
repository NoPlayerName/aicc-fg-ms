<?php

namespace App\Services\Permission;

use Illuminate\Support\Facades\Auth;

class PermissionService
{
    public static function userHasPermission(int $menuId, string $permission = 'can_access'): bool
    {
        $user = Auth::user();

        if (!$user) {
            return false;
        }

        $akses = $user->menuPermission()->where('menu_id', $menuId)->first();

        return $akses && $akses->$permission;
    }
}
