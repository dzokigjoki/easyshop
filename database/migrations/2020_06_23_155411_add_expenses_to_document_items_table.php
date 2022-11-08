<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExpensesToDocumentItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('document_items', function (Blueprint $table) {
            $table->decimal('customs', 11, 2)->default(0);
            $table->decimal('transport', 11, 2)->default(0);
            $table->decimal('freight_forwarder', 11, 2)->default(0);
            $table->decimal('currency_conversion', 11, 2)->default(1); // Used in priemnica
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
            $table->dropColumn('customs');
            $table->dropColumn('transport');
            $table->dropColumn('freight_forwarder');
            $table->dropColumn('currency_conversion');
        });
    }
}
