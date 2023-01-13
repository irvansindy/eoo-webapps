<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Product extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'products';

    protected $fillable = [
        'productName',
        'productTypeId',
        'productDiameterId',
        'productlengthId',
        'productvariantId',
        'productWeightStandard',
        'kgPerHour',
        'pcsPerHour',
        'kgPerDay',
        'pcsPerDay',
        'productionAccuracyTolerancePerPcs',
        'productFormula',
        'productSocket',
    ];

    protected $hidden = [];
}
