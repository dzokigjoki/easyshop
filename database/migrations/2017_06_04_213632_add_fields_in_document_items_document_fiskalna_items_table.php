<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsInDocumentItemsDocumentFiskalnaItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('document_items', function (Blueprint $table) {
            $table->string('unit_code', 50)->nullable()->default(null);
        });

        Schema::table('document_fiskalna_items', function (Blueprint $table) {
            $table->string('unit_code', 50)->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('document_items', function (Blueprint $table) {
            $table->dropColumn('unit_code');
        });

        Schema::table('document_fiskalna_items', function (Blueprint $table) {
            $table->dropColumn('unit_code');
        });
    }
}
