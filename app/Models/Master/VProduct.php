<?php

namespace App\Models\Master;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class VProduct extends BaseModel
{
    protected $table = 'v_products';

    public function product()
    {
        return $this->belongsTo(Product::class, 'part_no', 'part_no');
    }
}
