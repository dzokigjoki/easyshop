<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOtherColumnsToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('title_lang2', 255)->nullable()->default(null);
            $table->string('url_lang2', 100)->nullable()->default(null);
            $table->string('meta_description_lang2', 255)->nullable()->default(null);
            $table->string('short_description_lang2', 255)->nullable()->default(null);
            $table->text('description_lang2')->nullable()->default(null);
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->string('title_lang2', 255)->nullable()->default(null);
            $table->string('url_lang2', 100)->nullable()->default(null);
            $table->text('description_lang2')->nullable()->default(null);
            $table->string('meta_description_lang2', 255)->nullable()->default(null);
        });

        Schema::table('posts', function (Blueprint $table) {
            $table->string('title_lang2', 255)->nullable()->default(null);
            $table->string('url_lang2', 100)->nullable()->default(null);
            $table->string('short_description_lang2', 255)->nullable()->default(null);
            $table->string('meta_description_lang2', 255)->nullable()->default(null);
            $table->text('description_lang2')->nullable()->default(null);
        });

        Schema::table('filters', function (Blueprint $table) {
            $table->string('name_lang2', 255)->nullable()->default(null);
        });



        Schema::table('filters_attributes', function (Blueprint $table) {
            $table->string('value_lang2', 255)->nullable()->default(null);
        });
    }
}
