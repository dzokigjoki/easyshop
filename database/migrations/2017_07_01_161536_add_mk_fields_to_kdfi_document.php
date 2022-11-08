<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMkFieldsToKdfiDocument extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('report_kdfi', function (Blueprint $table) {
            $table->decimal('mk_promet_vkupen', 11, 2)->default(0);
            $table->decimal('mk_iznos_ddv_0', 11, 2)->default(0);
            $table->decimal('mk_iznos_ddv_5', 11, 2)->default(0);
            $table->decimal('mk_iznos_ddv_18', 11, 2)->default(0);
            $table->decimal('mk_iznos_vkupen_ddv', 11, 2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('report_kdfi', function (Blueprint $table) {
            $table->dropColumn('mk_promet_vkupen');
            $table->dropColumn('mk_iznos_ddv_0');
            $table->dropColumn('mk_iznos_ddv_5');
            $table->dropColumn('mk_iznos_ddv_18');
            $table->dropColumn('mk_iznos_vkupen_ddv');
        });
    }
}
