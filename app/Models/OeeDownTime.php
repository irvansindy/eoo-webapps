<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OeeDownTime extends Model
{
    use HasFactory;
    protected $table = 'oee_down_times';

    protected $guarded = [];
}
