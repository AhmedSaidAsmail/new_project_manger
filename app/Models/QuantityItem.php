<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuantityItem extends Model
{
    protected $fillable = [
        'quantity_id',
        'sort',
        'name',
        'contractual_quantity',
        'unit',
        'price',
        'total',
        'current_quantity',
        'previous_done',
        'current_done',
    ];
}
