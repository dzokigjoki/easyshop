<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoritesCompares extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites_compares', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->enum('type', array('favorite', 'compare'))->default('favorite');
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
        Schema::table('favorites_compares', function(Blueprint $table) {
            $table->dropForeign('favorites_compares_product_id_foreign');
        });

        Schema::drop('favorites_compares');
    }
}
