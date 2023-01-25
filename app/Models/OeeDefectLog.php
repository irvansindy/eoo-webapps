<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OeeDefectLog extends Model
{
    use HasFactory;
    protected $table = 'oee_defect_logs';
    protected $guarded = [];

    public function oeeMaster() {
        return $this->hasMany(oeeMaster::class, 'id', 'oeeMasterId');
    }

    public function OeeDefect() {
        return $this->hasOne(OeeDefect::class, 'id', 'defectId');
    }
}

