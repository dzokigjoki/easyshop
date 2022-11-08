<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function(Blueprint $table) {

            $table->increments('id');
            $table->integer('client_id')->unsigned()->nullable()->default(NULL);
            $table->integer('accepted_from')->unsigned()->nullable()->default(NULL);
            $table->integer('servicer')->unsigned()->nullable()->default(NULL);
            $table->integer('manufacturer')->unsigned()->nullable()->default(NULL);
            $table->string('model')->nullable()->default(NULL);
            $table->string('serial_number')->nullable()->default(NULL);
            $table->string('known_problems')->nullable()->default(NULL);
            $table->string('problems')->nullable()->default(NULL);
            $table->string('reclamation')->nullable()->default(NULL);
            $table->string('comment')->nullable()->default(NULL);
            $table->integer('order_id')->unsigned()->nullable()->default(NULL);
            $table->enum('tezina', [1,2,3,4,5]);
            $table->enum('servis_status', ['primen_na_servis', 'se_raboti','zavrsen', 'nemoze_da_se_popravi','odbien']);
            $table->nullableTimestamps();

            $table->foreign('accepted_from')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('servicer')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('order_id')->references('id')->on('documents')->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('services', function($table) {
            $table->dropForeign('services_client_id_foreign');
            $table->dropForeign('services_accepted_from_foreign');
            $table->dropForeign('services_servicer_foreign');
            $table->dropForeign('services_manufacturer_foreign');
        });

        Schema::drop('services');
    }
}
