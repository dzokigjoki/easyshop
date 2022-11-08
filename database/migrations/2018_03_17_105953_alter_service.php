<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterService extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('services', function (Blueprint $table) {            
            $table->text('contact_phone')->nullable();
            $table->text('document_number')->nullable();
            $table->integer('warehouse_id')->nullable();
            $table->date('date_reklamacija')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn([
                'contact_phone','document_number','warehouse_id','date_reklamacija'
            ]);
        });
    }
}
