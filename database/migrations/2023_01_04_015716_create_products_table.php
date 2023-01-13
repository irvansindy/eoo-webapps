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
            // $table->unsignedInteger('productCategoryId')->nullable();
            // $table->unsignedInteger('productClassId')->nullable();
            $table->unsignedInteger('productTypeId')->nullable();
            $table->unsignedInteger('productDiameterId')->nullable();
            $table->unsignedInteger('productlengthId')->nullable();
            $table->unsignedInteger('productvariantId')->nullable();
            $table->unsignedInteger('productWeightStandard')->nullable();
            $table->float('kgPerHour');
            $table->float('pcsPerHour');
            $table->float('kgPerDay');
            $table->float('pcsPerDay');
            $table->float('productionAccuracyTolerancePerPcs')->nullable();
            $table->text('productFormula');
            $table->string('productSocket');
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
