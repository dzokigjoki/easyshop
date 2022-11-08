<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToTempOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('temp_order_items', function (Blueprint $table) {
            $table->string('unit_code', 50)->nullable()->default(null);
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
        Schema::table('temp_order_items', function (Blueprint $table) {
            $table->dropColumn('unit_code');
            $table->dropColumn('proizvod_usluga');
            $table->dropColumn('stranski_domasen');
        });
    }
}
