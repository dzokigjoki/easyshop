<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportKdfiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_kdfi', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('datum_prenos')->nullable()->default(null);
            $table->decimal('promet_ddv_0', 11, 2)->default(0);
            $table->decimal('promet_ddv_5', 11, 2)->default(0);
            $table->decimal('promet_ddv_18', 11, 2)->default(0);
            $table->decimal('promet_vkupen', 11, 2)->default(0); // Za denot
            $table->decimal('iznos_ddv_0', 11, 2)->default(0);
            $table->decimal('iznos_ddv_5', 11, 2)->default(0);
            $table->decimal('iznos_ddv_18', 11, 2)->default(0);
            $table->decimal('iznos_vkupen_ddv', 11, 2)->default(0); //za denot vkupno ddv od prometot
            $table->integer('warehouse_id')->unsigned()->nullable()->default(null);
            $table->integer('employee_id')->unsigned()->nullable()->default(null);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('report_kdfi', function (Blueprint $table) {
            $table->dropForeign('report_kdfi_warehouse_id_foreign');
            $table->dropForeign('report_kdfi_employee_id_foreign');
        });

        Schema::drop('report_kdfi');
    }
}
