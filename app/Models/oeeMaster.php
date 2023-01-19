<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class oeeMaster extends Model
{
    use HasFactory;
    protected $table = 'oee_masters';

    protected $guarded = [];
}
