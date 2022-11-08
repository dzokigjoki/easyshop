<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductAttributes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attributes', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('filter_id')->unsigned();
            $table->integer('filter_att_id')->unsigned(); 
            $table->nullableTimestamps();

            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('filter_id')->references('id')->on('filters')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('filter_att_id')->references('id')->on('filters_attributes')
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_attributes', function(Blueprint $table) {
            $table->dropForeign('product_attributes_product_id_foreign');
            $table->dropForeign('product_attributes_filter_id_foreign');
            $table->dropForeign('product_attributes_filter_att_id_foreign');
        });

        Schema::drop('product_attributes');
    }
}
