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

    public function productType() {
        return $this->hasOne(ProductType::class, 'id');
    }
    public function productDiameter() {
        return $this->hasOne(ProductDiameterSize::class, 'id');
    }
    public function productLength() {
        return $this->hasOne(ProductLengthSize::class, 'id');
    }
    public function ProductVariant() {
        return $this->hasOne(ProductVariant::class, 'id');
    }
}
