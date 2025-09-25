<?php

namespace App\Models\Transaction;

use App\Enums\StatusStockEnums;
use App\Models\BaseModel;

class StockIn extends BaseModel
{
    protected $table = 'tb_stock_in';

    protected $casts = [
        'status' => StatusStockEnums::class,
        'qty' => 'integer',
    ];
    protected $fillable = [
        'part_no',
        'part_name',
        'pallet_no',
        'qty',
        'rack_no',
        'status',
        'desc',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at',
    ];

    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('d-m-Y H:i');
    }
}
