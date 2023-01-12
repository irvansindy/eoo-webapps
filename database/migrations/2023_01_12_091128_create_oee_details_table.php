<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOeeDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oee_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('oeeMasterId');
            $table->unsignedInteger('productId');
            $table->unsignedInteger('machineId');
            $table->unsignedInteger('tempExtruderId');
            $table->integer('zoneNumber');
            $table->float('adapterZone');
            $table->float('oeeDetailValue');
            $table->date('date');
            $table->time('time');
            $table->float('screwSpeed');
            $table->float('dosingSpeed');
            $table->float('mainDrive');
            $table->float('vacumCylinder');
            $table->float('meltPressure');
            $table->float('vacumTank');
            $table->float('haulOffSpeed');
            $table->float('waterTempVacumTank');
            $table->float('waterPressure');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oee_details');
    }
}
