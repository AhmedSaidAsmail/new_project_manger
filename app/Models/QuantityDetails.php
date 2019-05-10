<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuantityDetails extends Model
{
    protected $fillable = [
        'quantity_id',
        'extra_durations',
        'submission_date_to_consultant',
        'submission_date_to_owner',
        'approval_date_to_owner',
        'date_of_last_disbursement_to_contractor',
        'total_abstracts_not_disbursed_by_the_owner',
        'total_abstracts',
        'contractual_cost',
        'cost_after_change_order_number_4',
        'total_value_of_the_change_order_number_4',
        'previous_cost',
        'current_cost',
        'total_cost',
    ];
    protected $casts = [
        'submission_date_to_consultant' => 'date',
        'submission_date_to_owner' => 'date',
        'date_of_last_disbursement_to_contractor' => 'date',
        'approval_date_to_owner' => 'date',
    ];
    public $timestamps = false;
}
