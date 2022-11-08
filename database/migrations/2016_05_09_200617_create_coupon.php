<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoupon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->string('name');
            $table->enum('type', array('percent', 'fixed'));
            $table->decimal('value', 11, 2)->default(0);
            $table->integer('reuse_number');
            $table->datetime('start');
            $table->datetime('end');
            $table->boolean('group_retail_1')->default(1);
            $table->boolean('group_retail_2')->default(1);
            $table->boolean('group_wholesale_1')->default(1);
            $table->boolean('group_wholesale_2')->default(1);
            $table->boolean('group_wholesale_3')->default(1);
            $table->nullableTimestamps();

            $table->foreign('product_id')->references('id')->on('products')
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
        Schema::table('coupons', function(Blueprint $table) {
            $table->dropForeign('coupons_product_id_foreign');
        });


        Schema::drop('coupons');
    }
}
