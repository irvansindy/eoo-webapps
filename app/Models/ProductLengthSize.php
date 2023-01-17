<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class ProductLengthSize extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'product_length_sizes';
    protected $guarded = [];
}
