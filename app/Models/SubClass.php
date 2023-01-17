<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubClass extends Model
{
    use HasFactory, SoftDeletes;
        
    protected $table = 'sub_classes';

    protected $guarded = [];
}
