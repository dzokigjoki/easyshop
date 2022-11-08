<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('confirmation_code');
            $table->boolean('confirmed')->default(0);
            $table->string('phone', 30)->nullable()->default(NULL);
            $table->string('first_name', 150)->nullable()->default(NULL);
            $table->string('last_name', 150)->nullable()->default(NULL);
            $table->integer('city_id')->unsigned()->nullable();
            $table->integer('country_id')->unsigned()->nullable()->default(NULL);
            $table->string('city_other', 100)->nullable()->default(NULL);
            $table->string('zip_other', 10)->nullable()->default(NULL);
            $table->string('country_other', 100)->nullable()->default(NULL);
            $table->string('address', 100)->nullable()->default(NULL);
            $table->integer('city_id_shipping')->unsigned()->nullable();
            $table->integer('country_id_shipping')->unsigned()->nullable()->default(NULL);
            $table->string('city_other_shipping', 100)->nullable()->default(NULL);
            $table->string('zip_other_shipping', 10)->nullable()->default(NULL);
            $table->string('country_other_shipping', 100)->nullable()->default(NULL);
            $table->string('address_shiping')->nullable()->default(NULL);
            $table->string('company', 100)->nullable()->default(NULL);
            $table->enum('gender', array('male', 'female'))->nullable()->default(NULL);
            $table->enum('type', array('person', 'company'))->default('person');
            $table->enum('nacin_plakanje', array('karticka', 'faktura','gotovo'))->default('karticka');
            $table->enum('cenovna_grupa', array('price_retail_1','price_retail_2','price_wholesale_1','price_wholesale_2','price_wholesale_3'))->default('price_retail_1');
            
            $table->string('danocen_broj')->nullable()->default(NULL);
            $table->string('website')->nullable()->default(NULL);
            $table->text('note')->nullable()->default(NULL);
            $table->boolean('aktiven')->default(0);
            $table->integer('warehouse_id')->unsigned()->nullable()->default(NULL);
            $table->rememberToken();
            $table->nullableTimestamps();

            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('city_id')->references('id')->on('cities');
            $table->foreign('warehouse_id')->references('id')->on('warehouses')
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

        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('users_country_id_foreign');
            $table->dropForeign('users_city_id_foreign');
            $table->dropForeign('users_warehouse_id_foreign');
        });

        Schema::drop('users');
    }
}
