<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStickerIdToCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            
            $table->unsignedInteger('sticker_id')->nullable();

            $table->foreign('sticker_id')->references('id')->on('stickers')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }
}
