<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnTableOeeMasters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oee_masters', function (Blueprint $table) {
            $table->float('goodPipeStandartKg')->after('remark');
            $table->float('goodPipeStandartPcs')->after('goodPipeStandartKg');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('oee_masters', function (Blueprint $table) {
            //
        });
    }
}
