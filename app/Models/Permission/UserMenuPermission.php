<?php

namespace App\Models\Permission;

use App\Models\Menu\Menu;
use Illuminate\Database\Eloquent\Model;

class UserMenuPermission extends Model
{
    protected $table = 'tb_user_permissions';

    protected $fillable = [
        'user_id',
        'menu_id',
        'can_access',
        'can_read',
        'can_edit',
        'can_delete',
        'can_add',

    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }
}
