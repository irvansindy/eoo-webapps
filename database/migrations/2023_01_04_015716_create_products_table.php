<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('productName');
            $table->unsignedInteger('productCategoryId')->nullable();
            $table->unsignedInteger('productClassId')->nullable();
            $table->unsignedInteger('productTypeId')->nullable();
            $table->unsignedInteger('productDiameterId')->nullable();
            $table->unsignedInteger('productlengthId')->nullable();
            $table->unsignedInteger('productvariantId')->nullable();
            $table->unsignedInteger('productWeight')->nullable();
            $table->integer('kgPerHour');
            $table->integer('pcsPerHour');
            $table->integer('kgPerDay');
            $table->integer('pcsPerDay');
            $table->integer('productionAccuracyTolerancePerPcs')->nullable();
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
        Schema::dropIfExists('products');
    }
}
