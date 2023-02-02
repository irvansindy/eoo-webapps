<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVacumTankWaterTemperature extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oee_details', function (Blueprint $table) {
            $table->float('vacumTank2')->after('vacumTank');
            $table->float('vacumTank3')->after('vacumTank2');
            $table->float('vacumTank4')->after('vacumTank3');
            $table->float('waterTempVacumTank2')->after('waterTempVacumTank');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oee_details', function (Blueprint $table) {
            //
        });
    }
}
