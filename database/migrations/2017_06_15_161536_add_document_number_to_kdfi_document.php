<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDocumentNumberToKdfiDocument extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('report_kdfi', function (Blueprint $table) {
            $table->string('document_number', 50)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('report_kdfi', function (Blueprint $table) {
            $table->dropColumn('document_number');
        });
    }
}
