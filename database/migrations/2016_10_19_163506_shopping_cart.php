<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ShoppingCart extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_cart', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned()->nullable()->default(null);
            $table->integer('product_id')->unsigned();
            $table->integer('quantity')->unsigned()->default(1);
            $table->integer("variation")->unsigned()->nullable()->default(null);
            $table->string('guest_id', 13)->nullable()->default(null);
            $table->nullableTimestamps();
            
            $table->foreign('variation')->references('id')->on('variations');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shopping_cart', function(Blueprint $table) {
            $table->dropForeign('shopping_cart_product_id_foreign');

        });

        Schema::drop('shopping_cart');
    }
}
