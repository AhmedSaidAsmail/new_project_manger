<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuantityAttachments extends Model
{
    protected $fillable = [
        'quantity_id',
        'inventory_of_construction_works',
        'inventory_of_architectural_works',
        'inventory_of_mechanical_works',
        'inventory_of_electrical_works',
        'contractors_classification_certificate',
        'certificate_of_enrollment_of_the_financial_year',
        'company_registration_certificate',
        'certificate_of_zakat_and_income',
        'insurance_certificate',
        'construction_contract',
        'receipt_of_the_site',
        'link_card',
        'conversion_model',
        'diwan_discounts',
        'contractor_letter',
        'summary',
        'consultant_letter',
        'payroll_for_contractor',
        'notes',
        'constraints',
    ];
}
