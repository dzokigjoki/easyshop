<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIndicatorsToAllItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('document_items', function (Blueprint $table) {
            $table->enum('proizvod_usluga', array('P', 'U'))->nullable()->default('P');
            $table->enum('stranski_domasen', array('S', 'D'))->nullable()->default('S');
        });
        Schema::table('document_fiskalna_items', function (Blueprint $table) {
            $table->enum('proizvod_usluga', array('P', 'U'))->nullable()->default('P');
            $table->enum('stranski_domasen', array('S', 'D'))->nullable()->default('S');
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
            $table->dropColumn('proizvod_usluga');
            $table->dropColumn('stranski_domasen');
        });
        Schema::table('document_fiskalna_items', function (Blueprint $table) {
            $table->dropColumn('proizvod_usluga');
            $table->dropColumn('stranski_domasen');
        });
    }
}
