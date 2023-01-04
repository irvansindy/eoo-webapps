<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class ProductClass extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'product_classes';

    protected $guarded = [];
}
