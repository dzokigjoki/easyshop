<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportNivelacijaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('report_nivelacija', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('datum_knizenje')->nullable()->default(null);
            $table->dateTime('datum_dokument')->nullable()->default(null);
            $table->string('document_number', 50)->nullable()->default(null);
            $table->decimal('iznos', 11, 2)->default(0);
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
        Schema::table('report_nivelacija', function (Blueprint $table) {
            $table->dropForeign('report_nivelacija_warehouse_id_foreign');
            $table->dropForeign('report_nivelacija_employee_id_foreign');
        });

        Schema::drop('report_nivelacija');
    }
}
