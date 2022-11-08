<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryFilters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_filters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('filter_id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->nullableTimestamps();

            $table->foreign('filter_id')->references('id')->on('filters')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('category_id')->references('id')->on('categories')
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
        Schema::table('category_filters', function(Blueprint $table) {
            $table->dropForeign('category_filters_filter_id_foreign');
            $table->dropForeign('category_filters_category_id_foreign');
        });

        Schema::drop('category_filters');
    }
}
