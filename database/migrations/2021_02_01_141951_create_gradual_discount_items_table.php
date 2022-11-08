<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradualDiscountItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gradual_discount_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('gradual_discount_id')->unsigned();
            $table->foreign('gradual_discount_id')->references('id')->on('gradual_discounts')->onDelete('cascade')->onUpdate('cascade');;
            $table->smallInteger('number_of_items')->nullable()->default(null);
            $table->smallInteger('discount_percentage')->nullable()->default(null);
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gradual_discount_items');
    }
}
