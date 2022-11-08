<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterFieldsInDicumentFiskalnaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents_fiskalna', function (Blueprint $table) {
            $table->enum('payment', array('karticka','gotovo','gotovo_karticka'))->default('gotovo');
            $table->decimal('payment_card', 11, 2)->nullable()->default(0);
            $table->decimal('payment_cash', 11, 2)->nullable()->default(0);
            $table->string('payment_card_type', 20)->nullable()->default(null);
            $table->tinyInteger('payment_card_installment')->nullable()->default(null);
            $table->string('bank_name', 20)->nullable()->default(null);
            $table->integer('employee_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents_fiskalna', function (Blueprint $table) {
            $table->dropColumn('payment_card');
            $table->dropColumn('payment_cash');
            $table->dropColumn('payment_card_type');
            $table->dropColumn('payment_card_installment');
            $table->dropColumn('bank_name');
            $table->dropColumn('employee_id');
            $table->dropColumn('payment');
        });
    }
}
