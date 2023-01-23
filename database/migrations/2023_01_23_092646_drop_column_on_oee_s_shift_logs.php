<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnOnOeeSShiftLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oee_shift_logs', function (Blueprint $table) {
            $table->dropColumn('goodPipeActual');
            $table->dropColumn('goodPipeStandart');
            $table->dropColumn('scrapToping');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oee_shift_logs', function (Blueprint $table) {
            //
        });
    }
}
