<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterServiceColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {            
            $table->text('used_parts')->nullable()->default(null);
            $table->string('expected_time', 100)->nullable()->default(null);
            $table->string('pass_code', 100)->nullable()->default(null);
            $table->string('expected_price', 100)->nullable()->default(null);
            $table->smallInteger('contacted')->default(0);
            $table->dateTime('date_priem')->nullable()->default(null);
            $table->dateTime('date_zavrsen')->nullable()->default(null);
            $table->dateTime('date_podignat')->nullable()->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('used_parts');
            $table->dropColumn('expected_time');
            $table->dropColumn('pass_code');
            $table->dropColumn('expected_price');
            $table->dropColumn('contacted');
            $table->dropColumn('date_priem');
            $table->dropColumn('date_zavrsen');
            $table->dropColumn('date_podignat');
        });
    }
}
