<?php

namespace App\Models\Master;

use App\Models\BaseModel;

class RackGroup extends BaseModel
{
    protected $table = 'tb_rack_group';

    protected $fillable = [
        'group',
        'group_rack',
        'priority',
    ];
}
