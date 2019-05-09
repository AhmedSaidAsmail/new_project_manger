<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuantityItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quantity_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity_id')->unsigned();
            $table->foreign('quantity_id')->references('id')->on('quantities')->onDelete('cascade');
            $table->string('sort');
            $table->string('name');
            $table->float('contractual_quantity')->default(0);
            $table->string('unit')->nullable();
            $table->float('price')->default(0);
            $table->float('total')->default(0);
            $table->float('current_quantity')->default(0);
            $table->float('previous_done')->default(0);
            $table->float('current_done')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quantity_items');
    }
}
