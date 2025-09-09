<?php

namespace App\Models\Transaction;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class StockChange extends BaseModel
{
    protected $table = 'tb_stock_change';

    protected $fillable = [
        'form_no',
        'pallet_no',
        'part_no',
        'part_name',
        'product_code',
        'qty',
        'customer',
        'created_by',
        'created_at',
        'updated_at',
    ];
}
