<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfficesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offices', function (Blueprint $table) {
            $table->id();
            $table->string('officeInitial');
            $table->string('officeName');
            $table->unsignedInteger('officeTypeId');
            $table->text('officeAddress');
            $table->unsignedInteger('officeProvinceId');
            $table->unsignedInteger('officeCityId');
            $table->unsignedInteger('officeDistrictId');
            $table->unsignedInteger('officeVillageId');
            $table->unsignedInteger('officePostalCode');
            $table->enum('activeFlag', ['active', 'nonactive']);
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
        Schema::dropIfExists('offices');
    }
}
