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
        return $this->belongsTo(ProductType::class, 'productTypeId');
    }
    public function productDiameter() {
        return $this->belongsTo(ProductDiameterSize::class, 'productDiameterId');
    }
    public function productLength() {
        return $this->belongsTo(ProductLengthSize::class, 'productlengthId');
    }
    public function ProductVariant() {
        return $this->belongsTo(ProductVariant::class, 'productvariantId');
    }

    public function productSocket() {
        return $this->belongsTo(Socket::class, 'productSocket');
    }
}
