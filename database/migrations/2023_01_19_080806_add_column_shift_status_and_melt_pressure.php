<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnShiftStatusAndMeltPressure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oee_details', function (Blueprint $table) {
            $table->float('meltTemperature')->after('meltPressure');
            $table->integer('shift')->after('waterPressure');
            $table->integer('status')->after('shift');
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
