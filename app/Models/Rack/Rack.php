<?php

namespace App\Models\Rack;

use App\Models\BaseModel;

// use Illuminate\Database\Eloquent\Model;

class Rack extends BaseModel
{

    protected $table = 'tb_rack';

    protected $fillable = [
        'rack_no',
        'part_no',
        'product_code',
        'status',
    ];
}
