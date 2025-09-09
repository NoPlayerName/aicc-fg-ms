<?php

namespace App\Models\Pallet;

use App\Models\BaseModel;

class Pallet extends BaseModel
{
    protected $table = 'tb_pallet';

    protected $fillable = [
        'pallet_no',
        'pallet_type',
        'name',
        'color',
        'customer',
        'product',
        'status',
        'is_active',
    ];
}
