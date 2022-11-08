<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerTableCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banner_table_category', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('banner_id')->unsigned();
            $table->integer('banner_category_id')->unsigned();
            $table->nullableTimestamps();
            $table->foreign('banner_id')->references('id')->on('banners')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('banner_category_id')->references('id')->on('banner_category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banner_table_category', function (Blueprint $table) {
            $table->dropForeign('banners_banner_id_foreign');
            $table->dropForeign('banner_category_banner_category_id_foreign');
        });
        Schema::drop('banner_table_category');
    }
}
