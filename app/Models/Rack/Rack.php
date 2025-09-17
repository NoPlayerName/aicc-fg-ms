<?php

namespace App\Models\Rack;

use App\Enums\StatusRackEnums;
use App\Models\BaseModel;

// use Illuminate\Database\Eloquent\Model;

class Rack extends BaseModel
{

    protected $table = 'tb_rack';

    protected $casts = [

        'status' => StatusRackEnums::class,
    ];

    protected $fillable = [
        'rack_no',
        'part_no',
        'product_code',
        'status',
    ];
}
