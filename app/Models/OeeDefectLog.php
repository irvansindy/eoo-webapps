<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OeeDefectLog extends Model
{
    use HasFactory;
    protected $table = 'oee_defect_logs';
    protected $guarded = [];
}

