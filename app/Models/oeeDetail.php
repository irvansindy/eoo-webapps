<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class oeeDetail extends Model
{
    use HasFactory;

    protected $table = 'oee_details';

    protected $fillable = [
        'oeeMasterId',
        'productId',
        'machineId',
        'tempExtruderId',
        'zoneNumber',
        'adapterZone',
        'oeeDetailValue',
        'date',
        'time',
        'screwSpeed',
        'dosingSpeed',
        'mainDrive',
        'vacumCylinder',
        'meltPressure',
        'vacumTank',
        'haulOffSpeed',
        'waterTempVacumTank',
        'waterPressure',
    ];
}
