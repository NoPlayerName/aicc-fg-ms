<?php

namespace App\Models\Transaction;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class Transaction extends BaseModel
{
    protected $table = 'tb_transaction';
    protected $fillable = [
        'pallet_no',
        'product',
        'status',
        'location',
        'desc',
        'created_at',
    ];
}
