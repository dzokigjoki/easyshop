<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFakturaOnlineToDocumentsRelatedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents_related', function (Blueprint $table) {
            $table->integer('faktura_online_id')->unsigned()->nullable()->default(null);
            $table->foreign('faktura_online_id')->references('id')->on('faktura_online');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents_related', function (Blueprint $table) {
            $table->dropForeign('documents_faktura_online_id_foreign');
            $table->dropColumn('faktura_online_id');
        });

    }
}
