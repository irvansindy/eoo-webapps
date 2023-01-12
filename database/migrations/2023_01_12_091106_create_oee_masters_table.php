<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOeeMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oee_masters', function (Blueprint $table) {
            $table->id();
            $table->float('goodProductActualPcs');
            $table->float('goodProductActualKg');
            $table->unsignedInteger('productId');
            $table->unsignedInteger('officeId');
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
        Schema::dropIfExists('oee_masters');
    }
}
