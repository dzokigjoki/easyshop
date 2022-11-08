<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterFakturaOnline extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('faktura_online', function (Blueprint $table) {            
            $table->text('status_log')->nullable();
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
        Schema::table('faktura_online', function (Blueprint $table) {
            $table->dropColumn([
                'status_log'
            ]);
        });
    }
}
