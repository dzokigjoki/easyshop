<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToDocumentsTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->integer('employee_id')->nullable();
            $table->dateTime('naracka_ispratena_na')->nullable()->default(NULL);
            $table->dateTime('naracka_platena_na')->nullable()->default(NULL);
            $table->text('status_log')->nullable()->default(NULL); // Can not add default '[]'  SQLSTATE[42000]: Syntax error or access violation:

            $table->index('naracka_ispratena_na');
            $table->index('naracka_platena_na');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn('employee_id');
            $table->dropColumn('naracka_ispratena_na');
            $table->dropColumn('naracka_platena_na');
            $table->dropColumn('status_log');

            $table->dropIndex('naracka_ispratena_na');
            $table->dropIndex('naracka_platena_na');
        });
    }
}
