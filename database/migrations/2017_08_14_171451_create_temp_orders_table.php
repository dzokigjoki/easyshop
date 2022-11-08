<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_orders', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->text('note')->nullable()->default(null);
            $table->string('checksum', 40)->nullable()->default(null);

            $table->string('type_delivery', 30)->nullable()->default(NULL);
            $table->decimal('price_delivery', 11, 2)->nullable()->default(NULL);
            $table->string('currency', 3)->nullable()->default(NULL);
            $table->text('document_json')->nullable()->default(NULL);

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
        Schema::table('temp_orders', function(Blueprint $table) {
            $table->dropForeign('temp_orders_user_id_foreign');
        });

        Schema::drop('temp_orders');
    }
}
