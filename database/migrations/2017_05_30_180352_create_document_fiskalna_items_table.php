<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentFiskalnaItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_fiskalna_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('document_id')->unsigned()->nullable()->default(NULL);
            $table->integer('product_id')->unsigned()->nullable()->default(NULL);
            $table->string('item_name')->nullable();
            $table->integer('quantity')->nullable();
            $table->string('document_number')->nullable();
            $table->string('vat', 3)->default('18');
            $table->decimal('price', 11, 2)->nullable();
            $table->decimal('price_no_vat', 11, 2)->nullable();
            $table->decimal('sum_vat', 11, 2)->nullable();
            $table->decimal('sum_no_vat', 11, 2)->nullable();
            $table->decimal('original_price', 11, 2)->nullable();
            $table->decimal('original_price_no_vat', 11, 2)->nullable();
            $table->decimal('original_sum_vat', 11, 2)->nullable();
            $table->decimal('original_sum_no_vat', 11, 2)->nullable();
            $table->enum('discount_type', array('fixed', 'percentage'))->nullable()->default(null);
            $table->decimal('discount_type_value', 11, 2)->default(0);;
            $table->decimal('discount_value', 11, 2)->default(0);;

            $table->string('variation_id', 20)->nullable()->default(NULL);
            $table->nullableTimestamps();

            $table->foreign('document_id')->references('id')->on('documents_fiskalna')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::table('document_fiskalna_items', function($table) {
            $table->dropForeign('document_fiskalna_items_document_id_foreign');
            $table->dropForeign('document_fiskalna_items_product_id_foreign');
        });

        Schema::drop('document_fiskalna_items');
    }
}
