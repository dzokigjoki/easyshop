<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_items', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('document_id')->unsigned()->nullable()->default(NULL);
            $table->integer('product_id')->unsigned()->nullable()->default(NULL);
            $table->string('item_name')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('document_number')->nullable();
            $table->decimal('price', 11, 2)->nullable();
            $table->string('vat', 3)->default('18');
            $table->decimal('price_no_vat',11, 2)->nullable();
            $table->decimal('sum_no_vat', 11, 2)->nullable();
            $table->decimal('sum_vat', 11, 2)->nullable();
            $table->string('variation_id', 20)->nullable()->default(NULL);
            $table->nullableTimestamps();

            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::table('document_items', function($table) {
            $table->dropForeign('document_items_document_id_foreign');
            $table->dropForeign('document_items_product_id_foreign');
        });

        Schema::drop('document_items');
    }
}
