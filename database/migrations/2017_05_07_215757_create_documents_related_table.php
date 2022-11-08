<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsRelatedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents_related', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ostanato_id')->unsigned()->nullable()->default(null);
            $table->integer('naracka_id')->unsigned()->nullable()->default(null);
            $table->integer('profaktura_id')->unsigned()->nullable()->default(null);
            $table->integer('faktura_id')->unsigned()->nullable()->default(null);
            $table->integer('ispratnica_id')->unsigned()->nullable()->default(null);
            $table->integer('vlez_id')->unsigned()->nullable()->default(null);
            $table->integer('izlez_id')->unsigned()->nullable()->default(null);
            $table->integer('rezervacija_id')->unsigned()->nullable()->default(null);
            $table->integer('fiskalna_id')->unsigned()->nullable()->default(null);

            $table->foreign('ostanato_id')->references('id')->on('documents');
            $table->foreign('naracka_id')->references('id')->on('documents');
            $table->foreign('profaktura_id')->references('id')->on('documents');
            $table->foreign('faktura_id')->references('id')->on('documents');
            $table->foreign('ispratnica_id')->references('id')->on('documents');
            $table->foreign('vlez_id')->references('id')->on('documents');
            $table->foreign('izlez_id')->references('id')->on('documents');
            $table->foreign('rezervacija_id')->references('id')->on('documents');
            $table->foreign('fiskalna_id')->references('id')->on('documents_fiskalna');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents_related', function(Blueprint $table) {
            $table->dropForeign('documents_related_ostanato_id_foreign');
            $table->dropForeign('documents_related_naracka_id_foreign');
            $table->dropForeign('documents_related_profaktura_id_foreign');
            $table->dropForeign('documents_related_faktura_id_foreign');
            $table->dropForeign('documents_related_ispratnica_id_foreign');
            $table->dropForeign('documents_related_vlez_id_foreign');
            $table->dropForeign('documents_related_izlez_id_foreign');
            $table->dropForeign('documents_related_rezervacija_id_foreign');
            $table->dropForeign('documents_related_fiskalna_id_foreign');
        });

        Schema::drop('documents_related');
    }
}
