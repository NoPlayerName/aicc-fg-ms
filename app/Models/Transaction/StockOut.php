<?php

namespace App\Models\Transaction;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class StockOut extends BaseModel
{

    protected $table = 'tb_stock_out';
    protected $casts = [
        'qty' => 'integer',
    ];
    protected $fillable = [
        'part_no',
        'part_name',
        'pallet_no',
        'qty',
        'rack_no',
        'status',
        'customer',
        'desc',
        'created_by',
        'created_at',
        'updated_at',
    ];
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('d-m-Y H:i');
    }
}
