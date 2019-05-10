<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuantityDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quantity_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity_id')->unsigned();
            $table->foreign('quantity_id')->references('id')->on('quantities')->onDelete('cascade');
            $table->integer('extra_durations')->nullable();
            $table->date('submission_date_to_consultant')->nullable();
            $table->date('submission_date_to_owner')->nullable();
            $table->date('approval_date_to_owner')->nullable();
            $table->date('date_of_last_disbursement_to_contractor')->nullable();
            $table->integer('total_abstracts_not_disbursed_by_the_owner')->nullable();
            $table->integer('total_abstracts')->nullable();
            $table->float('contractual_cost')->nullable();
            $table->float('cost_after_change_order_number_4')->nullable();
            $table->float('total_value_of_the_change_order_number_4')->nullable();
            $table->float('previous_cost')->nullable();
            $table->float('current_cost')->nullable();
            $table->float('total_cost')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quantity_details');
    }
}
