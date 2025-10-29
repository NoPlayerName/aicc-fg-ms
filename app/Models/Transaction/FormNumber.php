<?php

namespace App\Models\Transaction;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Model;

class FormNumber extends BaseModel
{
    protected $table = 'tb_form_no';

    protected $fillable = [
        'form_number',
    ];
}
