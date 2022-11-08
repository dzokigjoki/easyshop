<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWarehousesTable extends Migration {

	public function up()
	{
		Schema::create('warehouses', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title', 256);
            $table->integer('city_id')->unsigned()->nullable();//foreign key treba
            $table->integer('country_id')->unsigned()->nullable();//foreign key treba
            $table->string('city_other', 100)->nullable()->default(NULL);
            $table->string('country_other', 100)->nullable()->default(NULL);
			$table->smallInteger('priority')->default(1);
			$table->nullableTimestamps();
            $table->softDeletes();


            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('city_id')->references('id')->on('cities');

		});
	}

	public function down()
	{
        Schema::table('warehouses', function(Blueprint $table) {
            $table->dropForeign('warehouses_country_id_foreign');
            $table->dropForeign('warehouses_city_id_foreign');
        });

		Schema::drop('warehouses');
	}
}