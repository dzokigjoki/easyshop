<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBundleProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bundle_products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('bundle')->notNullable();
            $table->unsignedInteger('product_id')->notNullable();
            $table->tinyInteger('quantity')->nullable()->default(null);
            $table->nullableTimestamps();


            $table->foreign('bundle')->references('id')->on('products');
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
        //
    }
}
