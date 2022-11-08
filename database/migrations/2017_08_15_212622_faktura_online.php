<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FakturaOnline extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('faktura_online', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();           
            $table->datetime('document_date')->nullable();
            $table->date('maturity_date')->nullable();
            $table->string('document_number')->nullable();
            $table->text('note')->nullable();
            $table->string('type')->default('faktura_online');
            $table->string('status')->default('generirana');
            $table->enum('payment', array('ziro','karticka','gotovo','rati', 'gotovo_karticka'))->default('ziro');
            $table->enum('paid', array('platena','delumno-platena','neplatena'))->default('neplatena');
            $table->string('type_delivery', 30)->nullable()->default(NULL);
            $table->decimal('price_delivery', 11, 2)->nullable()->default(NULL);
            $table->string('currency', 3)->nullable()->default(NULL);
            $table->integer('supplier_id')->unsigned()->nullable();
            // warehouse_id - se koristat za koj magacin e documentot
            $table->integer('warehouse_id')->unsigned()->nullable();
            $table->boolean('web')->default(1);
            $table->string('tracking_code', 50)->nullable()->default(NULL);
            $table->string("checksum", 50)->nullable()->default(null);
            $table->text('document_json')->nullable();
            $table->string('posta',50)->nullable()->default(null);

            $table->nullableTimestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('supplier_id')->references('id')->on('suppliers')
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
        Schema::table('faktura_online', function(Blueprint $table) {
            $table->dropForeign('faktura_online_user_id_foreign');
            $table->dropForeign('faktura_online_supplier_id_foreign');
        });

        Schema::drop('faktura_online');
    }
}
