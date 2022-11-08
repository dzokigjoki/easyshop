<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImportersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('importers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 70)->nullable()->default(null);
            $table->integer('country_id')->unsigned()->nullable()->default(null);
            $table->nullableTimestamps();

            $table->foreign('country_id')->references('id')->on('countries');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('importers', function (Blueprint $table) {
            $table->dropForeign('importers_country_id_foreign');
        });

        Schema::drop('importers');
    }
}
