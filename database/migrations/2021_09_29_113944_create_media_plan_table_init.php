<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaPlanTableInit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (config( 'app.client') == 'naturatherapyshop_al' 
            || config( 'app.client') == 'naturatherapyshop'
            || config( 'app.client') == 'naturatherapyshop_alb'
            ) {
            Schema::create('media_plan', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable()->default(null);
                $table->text('content')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
