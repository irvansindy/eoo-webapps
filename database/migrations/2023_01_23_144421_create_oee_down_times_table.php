<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOeeDownTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oee_down_times', function (Blueprint $table) {
            $table->id();
            $table->integer('idle');
            $table->integer('setupRoutage');
            $table->integer('waitingForSparepart');
            $table->integer('setupDies');
            $table->integer('noMaterial');
            $table->integer('oeeMasterId');
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
        Schema::dropIfExists('oee_down_times');
    }
}
