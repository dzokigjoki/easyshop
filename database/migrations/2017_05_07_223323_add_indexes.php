<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndexes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->foreign('warehouse_id')->references('id')->on('warehouses');
            $table->index('document_date');
            $table->index('document_number');
            $table->index('type');
            $table->index('status');
            $table->index('web');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents', function(Blueprint $table) {
            $table->dropForeign('documents_warehouse_id_foreign');
            $table->dropIndex('document_date');
            $table->dropIndex('document_number');
            $table->dropIndex('type');
            $table->dropIndex('status');
            $table->dropIndex('web');
        });
    }
}
