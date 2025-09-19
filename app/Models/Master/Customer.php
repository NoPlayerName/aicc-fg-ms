<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'tb_customer';

    protected $casts = [
        'is_active' => 'boolean'
    ];

    protected $fillable = [
        'cutomer_name',
        'phone',
        'address',
        'is_active',
        'initial'
    ];
}
