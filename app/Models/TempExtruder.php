<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempExtruder extends Model
{
    use HasFactory;
    protected $table = 'temp_extruders';

    protected $guarded = [];
}
