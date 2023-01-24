<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OeeDownTimeLog extends Model
{
    use HasFactory;
    protected $table = 'oee_down_time_logs';

    protected $guarded = [];
}
