<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportDfiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_dfi', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('datum_knizenje')->nullable()->default(null);
            $table->dateTime('datum_dokument')->nullable()->default(null);
            $table->string('document_number', 50)->nullable()->default(null);
            $table->decimal('dneven_promet', 11, 2)->default(0);
            $table->integer('warehouse_id')->unsigned()->nullable()->default(null);
            $table->integer('employee_id')->unsigned()->nullable()->default(null);
            $table->timestamps();

            $table->foreign('warehouse_id')->references('id')->on('warehouses');
            $table->foreign('employee_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('report_dfi', function (Blueprint $table) {
            $table->dropForeign('report_dfi_warehouse_id_foreign');
            $table->dropForeign('report_dfi_employee_id_foreign');
        });

        Schema::drop('report_dfi');
    }
}
