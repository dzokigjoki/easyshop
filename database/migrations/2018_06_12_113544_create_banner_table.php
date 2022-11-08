<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('url');
            $table->string('image', 250)->nullable();
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();;
            $table->boolean('active')->default(0);
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
        Schema::drop('banners');
    }
}
