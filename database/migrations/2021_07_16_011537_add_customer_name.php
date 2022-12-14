<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCustomerName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->string('customer_name')->after('document_json')->nullable();
        });

        Schema::table('temp_orders', function (Blueprint $table) {
            $table->string('customer_name')->after('document_json')->nullable();
        });

    }

    public function down()
    {

    }
}
