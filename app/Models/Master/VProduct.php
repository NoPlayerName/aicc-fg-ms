<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class VProduct extends Model
{
    protected $connection = 'master';
    protected $table = 'v_products';


    public function product()
    {
        return $this->belongsTo(Product::class, 'part_no', 'part_no');
    }
}
