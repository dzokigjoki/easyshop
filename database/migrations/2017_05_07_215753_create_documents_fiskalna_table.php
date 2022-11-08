<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsFiskalnaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents_fiskalna', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->datetime('document_date')->nullable();
            $table->string('fiskalna_id', 50)->nullable(); // Se zema od config koja fiskalna e
            $table->string('document_number')->nullable();
            $table->text('note')->nullable();
            $table->string('status', 20)->default('ispecatena'); // ispecatena, neispecatena
            // warehouse_id - se koristat za koj magacin e documentot
            $table->integer('warehouse_id')->nullable();

            $table->nullableTimestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents_fiskalna', function(Blueprint $table) {
            $table->dropForeign('documents_fiskalna_user_id_foreign');
        });

        Schema::drop('documents_fiskalna');
    }
}
