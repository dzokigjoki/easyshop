<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Settings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name', 80)->nullable()->default(NULL);
            $table->string('company_address')->nullable()->default(NULL);
            $table->string('company_city')->nullable()->default(NULL);
            $table->string('company_country')->nullable()->default(NULL);
            $table->string('company_vat_number')->nullable()->default(NULL);
            $table->string('company_bank_account')->nullable()->default(NULL);
            $table->string('company_bank_name')->nullable()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('settings');
    }
}
