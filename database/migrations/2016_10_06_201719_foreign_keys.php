<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     

        Schema::table('product_warehouse', function(Blueprint $table) {
            $table->foreign('document_id')->references('id')->on('documents')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('other_warehouse')->references('id')->on('warehouses') 
                ->onDelete('cascade')
                ->onUpdate('cascade');

        });

        Schema::table('products', function(Blueprint $table) {
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('categories', function(Blueprint $table) {
            $table->foreign('parent')->references('id')->on('categories')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });
        
        Schema::table('product_category', function(Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('product_category', function(Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('discounts', function(Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('product_warehouse', function(Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('product_warehouse', function(Blueprint $table) {
            $table->foreign('warehouse_id')->references('id')->on('warehouses')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
        Schema::table('product_images', function(Blueprint $table) {
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

        Schema::table('product_warehouse', function (Blueprint $table) {
            $table->dropForeign('product_warehouse_document_id_foreign');
        });

        Schema::table('products', function(Blueprint $table) {
            $table->dropForeign('products_manufacturer_id_foreign');
        });

        Schema::table('categories', function(Blueprint $table) {
            $table->dropForeign('categories_parent_foreign');
        });
        Schema::table('product_category', function(Blueprint $table) {
            $table->dropForeign('product_category_product_id_foreign');
        });
        Schema::table('product_category', function(Blueprint $table) {
            $table->dropForeign('product_category_category_id_foreign');
        });
        Schema::table('discounts', function(Blueprint $table) {
            $table->dropForeign('discounts_product_id_foreign');
        });
        Schema::table('product_warehouse', function(Blueprint $table) {
            $table->dropForeign('product_warehouse_product_id_foreign');
        });
        Schema::table('product_warehouse', function(Blueprint $table) {
            $table->dropForeign('product_warehouse_warehouse_id_foreign');
        });
        Schema::table('product_images', function(Blueprint $table) {
            $table->dropForeign('product_images_product_id_foreign');
        });
    }
}
