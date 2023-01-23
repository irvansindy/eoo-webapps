<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOeeShiftLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oee_shift_logs', function (Blueprint $table) {
            $table->id();
            $table->float('machineId');
            $table->date('machineDate');
            $table->float('goodPipeActual');
            $table->float('scrapPipe');
            $table->float('scrapMaterial');
            $table->float('materialUse');
            $table->float('scrapToping');
            $table->float('goodPipeStandart');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oee_shift_logs');
    }
}
