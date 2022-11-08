<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromoCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_codes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 30)->notNullable();
            $table->string('discount_type', 10)->notNullable();
            $table->float('value', 11, 2)->default(0);
            $table->string('type', 20)->notNullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->integer('reuse_number');
            $table->datetime('start');
            $table->datetime('end');

            $table->nullableTimestamps();

            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('promo_codes', function(Blueprint $table) {
            $table->dropForeign('promo_codes_product_id_foreign');
        });


        Schema::drop('promo_codes');
    }
}
