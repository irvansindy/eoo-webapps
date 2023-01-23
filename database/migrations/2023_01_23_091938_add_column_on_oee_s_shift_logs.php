<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnOnOeeSShiftLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oee_shift_logs', function (Blueprint $table) {
            $table->float('ScrapStoping')->after('materialUse');
            $table->float('goodPipeStandartKg')->after('ScrapStoping');
            $table->float('goodPipeStandartPcs')->after('goodPipeStandartKg');
            $table->float('goodPipeActualKg')->after('machineDate');
            $table->float('goodPipeActualPcs')->after('goodPipeActualKg');
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
            $table->dropColumn('goodPipeActual');
            $table->dropColumn('goodPipeStandart');
            $table->dropColumn('scrapToping');
        });
    }
}
