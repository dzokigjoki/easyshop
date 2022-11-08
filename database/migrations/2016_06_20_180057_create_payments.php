<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('document_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->enum('type', array('ziro','karticka','fiskalna','ostanato'))->default('ziro');
            $table->decimal('price', 11, 2)->nullable();
            $table->nullableTimestamps();

            $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payments', function($table) {
            $table->dropForeign('payments_document_id_foreign');
            $table->dropForeign('payments_user_id_foreign');
        });

        Schema::drop('payments');
    }
}
