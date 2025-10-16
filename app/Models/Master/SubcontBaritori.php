<?php

namespace App\Models\Master;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class SubcontBaritori extends BaseModel
{
    protected $table = 'tb_subcont_baritori';

    protected $fillable = [
        'id',
        'name'
    ];
}
