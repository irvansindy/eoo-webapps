<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class ProductDiameterSize extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'product_diameter_sizes';

    protected $fillable = [
        'productDiameter',
        'productDiameterUnit'
    ];

    protected $hidden = [];
}
