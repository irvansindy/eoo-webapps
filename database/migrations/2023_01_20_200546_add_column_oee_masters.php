<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnOeeMasters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('oee_masters', function (Blueprint $table) {
            $table->float('scrapPipe')->after('goodProductActualKg');
            $table->float('scrapMaterial')->after('scrapPipe');
            $table->float('materialUse')->after('scrapMaterial');
            $table->float('scrapStoping')->after('materialUse');
            $table->string('remark')->after('scrapStoping');
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
