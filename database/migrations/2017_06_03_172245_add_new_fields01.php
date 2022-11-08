<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewFields01 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('newsletter')->default(1);
        });

        Schema::table('products', function (Blueprint $table) {
            $table->integer('zemja_poteklo')->unsigned()->nullable()->default(null);
            $table->decimal('tezina_kg' , 11, 2)->nullable()->default(null);
            $table->decimal('volumen_m3' , 11, 2)->nullable()->default(null);
            $table->string('carinski_tarifen_broj', 100)->nullable()->default(null);

            $table->foreign('zemja_poteklo')->references('id')->on('countries');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('newsletter');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_zemja_poteklo_foreign');
            $table->dropColumn('zemja_poteklo');
            $table->dropColumn('tezina_kg');
            $table->dropColumn('volumen_m3');
            $table->dropColumn('carinski_tarifen_broj');
        });
    }
}
