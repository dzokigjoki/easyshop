<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradualDiscountProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gradual_discount_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('gradual_discount_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('gradual_discount_id')->references('id')->on('gradual_discounts')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('gradual_discount_products');
    }
}
