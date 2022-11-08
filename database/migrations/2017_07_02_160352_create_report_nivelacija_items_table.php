<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportNivelacijaItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_nivelacija_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nivelacija_id')->unsigned()->nullable()->default(NULL);
            $table->string('document_number', 50)->nullable()->default(null);
            $table->integer('product_id')->unsigned()->nullable()->default(NULL);
            $table->string('unit_code', 50)->nullable()->default(null);
            $table->string('item_name')->nullable();
            $table->integer('quantity')->nullable();
            $table->decimal('old_price', 11, 2)->nullable();
            $table->decimal('old_price_sum', 11, 2)->nullable();
            $table->decimal('new_price', 11, 2)->nullable();
            $table->decimal('new_price_sum', 11, 2)->nullable();
            $table->decimal('price_difference', 11, 2)->nullable();
            $table->decimal('vat_difference', 11, 2)->nullable();
            $table->string('vat', 3)->default('18');
            $table->string('variation_id', 20)->nullable()->default(NULL);
            $table->nullableTimestamps();

            $table->foreign('nivelacija_id')->references('id')->on('report_nivelacija')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('report_nivelacija_items', function($table) {
            $table->dropForeign('report_nivelacija_items_nivelacija_id_foreign');
            $table->dropForeign('report_nivelacija_items_product_id_foreign');
        });

        Schema::drop('report_nivelacija_items');
    }
}
