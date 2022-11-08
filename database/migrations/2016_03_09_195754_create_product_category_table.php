<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductCategoryTable extends Migration {

	public function up()
	{
		Schema::create('product_category', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('product_id')->unsigned();
			$table->integer('category_id')->unsigned();
			$table->nullableTimestamps();
		});
	}

	public function down()
	{
		Schema::drop('product_category');
	}
}