<?php

namespace App\Models\Master;

use App\Models\BaseModel;

class Product extends BaseModel
{
    protected $table = 'tb_product';

    protected $fillable = [
        'part_no',
        'std_packing',
        'min_stock',
        'max_stock',
        'without_pallet',
        'group',
    ];

    public function prodName()
    {
        return $this->belongsTo(VProduct::class, 'part_no', 'part_no');
    }
}
