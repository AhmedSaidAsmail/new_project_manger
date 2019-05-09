<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuantityAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quantity_attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity_id')->unsigned();
            $table->foreign('quantity_id')->references('id')->on('quantities')->onDelete('cascade');
            $table->string('inventory_of_construction_works')->nullable();
            $table->string('inventory_of_architectural_works')->nullable();
            $table->string('inventory_of_mechanical_works')->nullable();
            $table->string('inventory_of_electrical_works')->nullable();
            $table->string('contractors_classification_certificate')->nullable();
            $table->string('certificate_of_enrollment_of_the_financial_year')->nullable();
            $table->string('company_registration_certificate')->nullable();
            $table->string('certificate_of_zakat_and_income')->nullable();
            $table->string('insurance_certificate')->nullable();
            $table->string('construction_contract')->nullable();
            $table->string('receipt_of_the_site')->nullable();
            $table->string('link_card')->nullable();
            $table->string('conversion_model')->nullable();
            $table->string('diwan_discounts')->nullable();
            $table->string('contractor_letter')->nullable();
            $table->string('summary')->nullable();
            $table->string('consultant_letter')->nullable();
            $table->string('payroll_for_contractor')->nullable();
            $table->string('notes')->nullable();
            $table->string('constraints')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quantity_attachments');
    }
}
