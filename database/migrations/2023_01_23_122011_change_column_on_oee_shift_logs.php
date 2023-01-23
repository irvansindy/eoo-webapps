<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnOnOeeShiftLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oee_shift_logs', function (Blueprint $table) {
            $table->renameColumn('ScrapStoping', 'scrapStoping');
            $table->renameColumn('goodPipeActualKg', 'goodProductActualKg');
            $table->renameColumn('goodPipeActualPcs', 'goodProductActualPcs');
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
