<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quantity extends Model
{
    protected $fillable = [
        'owner_id',
        'project_id',
        'contractor_id',
        'contractor_id',
        'date_from',
        'date_to'
    ];
    protected $casts = [
        'date_from' => 'date',
        'date_to' => 'date',
    ];

    public function detail()
    {
        return $this->hasOne(QuantityDetails::class);
    }

    public function attachment()
    {
        return $this->hasOne(QuantityAttachments::class);
    }

    public function items()
    {
        return $this->hasMany(QuantityItem::class);
    }
}
