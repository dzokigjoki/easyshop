<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration {

	public function up()
	{
		Schema::create('categories', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('parent')->unsigned()->nullable()->default(null);
			$table->string('title');
			$table->string('url', 100);
			$table->text('description')->nullable()->default(NULL);
			$table->integer('order')->unsigned()->default(1);
			$table->enum('type', ['list_category', 'list_product','list_posts', 'content']);
			$table->boolean('active')->default(0);
			$table->string('image', 50)->nullable()->default(NULL);
			$table->string('meta_title')->nullable()->default(NULL);
			$table->string('meta_keywords')->nullable()->default(NULL);
			$table->string('meta_description')->nullable()->default(NULL);
			$table->nullableTimestamps();
		});
	}

	public function down()
	{
		Schema::drop('categories');
	}
}