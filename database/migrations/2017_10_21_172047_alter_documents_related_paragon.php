<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDocumentsRelatedParagon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents_related', function (Blueprint $table) {
            $table->integer('paragon_id')->unsigned()->nullable()->default(null);
            $table->foreign('paragon_id')->references('id')->on('documents_fiskalna');
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
            $table->dropForeign('documents_related_paragon_id_foreign');
        });
    }
}
