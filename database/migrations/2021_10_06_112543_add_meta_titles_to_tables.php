<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMetaTitlesToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('meta_title_lang2', 255)->nullable()->default(null);
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->string('meta_title_lang2', 255)->nullable()->default(null);
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->string('meta_title_lang2', 255)->nullable()->default(null);
        });
    }
}
