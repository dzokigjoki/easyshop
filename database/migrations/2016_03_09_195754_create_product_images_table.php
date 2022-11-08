<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductImagesTable extends Migration {

	public function up()
	{
		Schema::create('product_images', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('product_id')->unsigned();
			$table->string('filename');
			$table->string('label')->nullable()->default(NULL);
			$table->tinyInteger('sort_order')->default(1);
			$table->nullableTimestamps();
		});
	}

	public function down()
	{
		Schema::drop('product_images');
	}
}