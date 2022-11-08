<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDocumentsRelatedPovratnica extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents_related', function (Blueprint $table) {
            $table->integer('povratnica_id')->unsigned()->nullable()->default(null);
            $table->foreign('povratnica_id')->references('id')->on('documents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('documents_related', function(Blueprint $table) {
            $table->dropForeign('documents_related_povratnica_id_foreign');
        });
    }
}
