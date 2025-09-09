<?php

namespace App\Models\Transaction;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Stock extends BaseModel
{
    protected $table = 'tb_stock';

    protected $fillable = [
        'part_no',
        'part_name',
        'product_code',
        'begining_balance',
        'stock_in',
        'stock_out',
        'closing_balance',
        'created_by',
        'created_at',
        'updated_at',
    ];
}
