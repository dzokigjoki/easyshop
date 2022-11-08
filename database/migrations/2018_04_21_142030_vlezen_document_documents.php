<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VlezenDocumentDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('documents', function (Blueprint $table) {            
            $table->text('vlezen_document')->nullable();
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
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn([
                'vlezen_document'
            ]);
        });
    }
}
