<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterFakturaOnlineItemsOriginalPrices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('faktura_online_items', function (Blueprint $table) {            
            $table->decimal('original_price', 11, 2)->nullable();
            $table->decimal('original_price_no_vat', 11, 2)->nullable();
            $table->decimal('original_sum_vat', 11, 2)->nullable();
            $table->decimal('original_sum_no_vat', 11, 2)->nullable();
            $table->enum('discount_type', array('fixed', 'percentage'))->nullable()->default(null);
            $table->decimal('discount_type_value', 11, 2)->default(0); // 20% or 1000den
            $table->decimal('discount_value', 11, 2)->default(0);// 20% * sum 
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
        Schema::table('faktura_online_items', function (Blueprint $table) {
            $table->dropColumn([
                'original_price',
                'original_price_no_vat',
                'original_sum_vat',
                'original_sum_no_vat',
                'discount_type',
                'discount_type_value',
                'discount_value',
            ]);
        });
    }
}
