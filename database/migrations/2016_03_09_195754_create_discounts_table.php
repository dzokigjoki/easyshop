<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDiscountsTable extends Migration {

	public function up()
	{
		Schema::create('discounts', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('product_id')->unsigned();
			$table->enum('type', array('percent', 'fixed'));
			$table->decimal('value', 11,2)->default(0);
			$table->datetime('start');
			$table->datetime('end');
			$table->boolean('price_retail_1')->default(1);
			$table->boolean('price_retail_2')->default(1);
			$table->boolean('price_wholesale_1')->default(1);
			$table->boolean('price_wholesale_2')->default(1);
			$table->boolean('price_wholesale_3')->default(1);
			$table->string('name');
			$table->nullableTimestamps();
		});
	}

	public function down()
	{
		Schema::drop('discounts');
	}
}