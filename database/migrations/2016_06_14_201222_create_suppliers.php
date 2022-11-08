<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('suppliers', function(Blueprint $table) {
            $table->increments('id');
            $table->string('company_name')->nullable();
            $table->string('contact_lice')->nullable();
            $table->string('edb')->nullable();
            $table->string('maticen')->nullable();
            $table->string('ziro_smetka')->nullable();
            $table->string('banka')->nullable();
            $table->string('address')->nullable();
            $table->integer('city_id')->unsigned()->nullable();//foreign key treba
            $table->integer('country_id')->unsigned()->nullable();//foreign key treba
            $table->string('city_other', 100);
            $table->string('zip_other', 10);           
            $table->string('country_other', 100);
            $table->string('phone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();
            $table->string('web')->nullable();
            $table->text('note')->nullable();
            $table->enum('type', array('company', 'person'))->nullable();
            $table->nullableTimestamps();
            $table->softDeletes();

            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('city_id')->references('id')->on('cities');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('suppliers', function(Blueprint $table) {
            $table->dropForeign('suppliers_country_id_foreign');
            $table->dropForeign('suppliers_city_id_foreign');
        });


        Schema::drop('suppliers');
    }
}
