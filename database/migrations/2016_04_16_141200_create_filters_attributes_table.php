<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiltersAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filters_attributes', function(Blueprint $table) {
            $table->increments('id');            
            $table->string('value'); 
            $table->integer('filter_id')->unsigned();                         
            $table->nullableTimestamps();

            $table->foreign('filter_id')->references('id')->on('filters')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::table('filters_attributes', function(Blueprint $table) {
            $table->dropForeign('filters_attributes_filter_id_foreign');
        });

        Schema::drop('filters_attributes');
    }
}
