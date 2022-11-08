<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsInDocumentFiskalnaItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('document_fiskalna_items', function (Blueprint $table) {
            $table->integer('fiskalna_id')->unsigned()->nullable()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('document_fiskalna_items', function (Blueprint $table) {
            $table->dropColumn('fiskalna_id');
        });
    }
}
