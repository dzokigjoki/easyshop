<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->string('url', 100)->unique();
			$table->string('image', 50)->nullable();
			$table->enum('type', array('product', 'service'));
			$table->string('unit_code', 50)->unique()->nullable();
			$table->string('sku', 100)->unique()->nullable();
			$table->string('short_description')->nullable();
			$table->text('description')->nullable();
			$table->string('meta_title')->nullable();
			$table->string('meta_keywords')->nullable();
			$table->string('meta_description')->nullable();
			$table->datetime('new_from')->nullable();
			$table->datetime('new_to')->nullable();
			$table->boolean('active')->default(0);
			$table->integer('total_stock')->default(0);
			$table->smallInteger('minimum_stock')->unsigned()->default(0);
			$table->smallInteger('warranty_months')->unsigned()->default(0);
			$table->string('vat', 3)->default('18');
			$table->decimal('price_retail_1', 11, 2)->default(0);
			$table->decimal('price_retail_2', 11, 2)->nullable()->default(0);
			$table->decimal('price_wholesale_1', 11, 2)->nullable()->default(0);
			$table->decimal('price_wholesale_2', 11, 2)->nullable()->default(0);
			$table->decimal('price_wholesale_3', 11, 2)->nullable()->default(0);
			$table->decimal('price_diners_24', 11, 2)->nullable()->default(0);
            $table->boolean('is_exclusive')->default(false);
            $table->boolean('is_best_seller')->default(false);
            $table->boolean('is_recommended')->default(false);
            $table->integer('visits')->default(0);
            $table->integer('price_nlb_24')->default(0);
            $table->integer('manufacturer_id')->unsigned()->nullable()->default(null);
            $table->boolean('has_variations')->default(false);
            $table->string('discount')->nullable();
            $table->boolean('sell_on_web')->default(1);
            $table->boolean('show_on_web')->default(1);
			$table->nullableTimestamps();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}