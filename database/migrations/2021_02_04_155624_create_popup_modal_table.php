<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePopupModalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('popup_modal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->notNullable();
            $table->string('short_description')->nullable()->default(null);
            $table->string('image', 50)->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->string('url')->nullable()->default(null);
            $table->boolean('active')->nullable()->default(false);
            $table->nullableTimestamps();
        });
    }

    public function down()
    {
        Schema::drop('popup_modal');
    }
}
