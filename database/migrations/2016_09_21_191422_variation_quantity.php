<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VariationQuantity extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variation_quantity', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('warehouse_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->string('variation_id', 20)->nullable()->default(NULL);
            $table->integer('quantity')->nullable();
            $table->nullableTimestamps();


            $table->foreign('warehouse_id')->references('id')->on('warehouses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('variation_quantity', function($table) {
            $table->dropForeign('variation_quantity_warehouse_id_foreign');
            $table->dropForeign('variation_quantity_product_id_foreign');
        });

        Schema::drop('variation_quantity');
    }
}
