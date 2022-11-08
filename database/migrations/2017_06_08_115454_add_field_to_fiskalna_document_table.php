<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldToFiskalnaDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents_fiskalna', function (Blueprint $table) {
            $table->string('daily_document_number', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents_fiskalna', function (Blueprint $table) {
            $table->dropColumn('daily_document_number');
        });
    }
}
