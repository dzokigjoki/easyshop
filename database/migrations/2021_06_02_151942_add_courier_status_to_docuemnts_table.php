<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCourierStatusToDocuemntsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->string('courier_status')->nullable()->default(null);
            $table->string('courier_tracking_id')->nullable()->default(null);
            $table->unsignedInteger('courier_id')->nullable()->default(null);
            $table->foreign('courier_id')->references('id')->on('couriers')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('documents');
    }
}
