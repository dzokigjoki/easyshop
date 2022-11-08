<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToTemoOrdersItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('temp_order_items', function (Blueprint $table) {
            $table->string('url', 100)->nullable()->default(null);
            $table->string('image')->nullable()->default(null);
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
            $table->dropColumn('url');
            $table->dropColumn('image');
        });
    }
}
