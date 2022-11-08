<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSettingsTableBankarskismetki extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('settings', function (Blueprint $table) {            
            $table->string('company_bank_account_2')->nullable()->default(NULL);
            $table->string('company_bank_name_2')->nullable()->default(NULL);
            $table->string('company_bank_account_3')->nullable()->default(NULL);
            $table->string('company_bank_name_3')->nullable()->default(NULL);
            $table->string('company_bank_account_4')->nullable()->default(NULL);
            $table->string('company_bank_name_4')->nullable()->default(NULL);  
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
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('company_bank_account_2');
            $table->dropColumn('company_bank_name_2');
            $table->dropColumn('company_bank_account_3');
            $table->dropColumn('company_bank_name_3');
            $table->dropColumn('company_bank_account_4');
            $table->dropColumn('company_bank_name_4');
        });
    }
}
