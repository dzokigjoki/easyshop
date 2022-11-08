<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductWarehouseTable extends Migration {

	public function up()
	{
		Schema::create('product_warehouse', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('product_id')->unsigned();
			$table->integer('warehouse_id')->unsigned();
			$table->integer('quantity')->default(0);			
            $table->string('document_type')->nullable();   
            $table->integer('document_id')->unsigned()->nullable()->default(null);
            $table->integer('other_warehouse')->unsigned()->nullable()->default(null);
            $table->string('variation_id', 20)->nullable()->default(null);
			$table->nullableTimestamps();

		});
	}

	public function down()
	{
		Schema::drop('product_warehouse');
	}
}