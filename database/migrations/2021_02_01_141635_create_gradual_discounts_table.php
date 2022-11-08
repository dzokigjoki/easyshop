<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradualDiscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gradual_discounts', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('start')->nullable()->default(null);
            $table->datetime('end')->nullable()->default(null);
            $table->string('name')->unique()->notNullable();
            $table->smallInteger('number_of_gradual_discounts');
            $table->nullableTimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::drop('gradual_discounts');
    }
}
