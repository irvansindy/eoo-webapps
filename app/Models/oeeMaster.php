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

    public function product() {
        return $this->hasOne(Product::class, 'id', 'productId');
    }

    public function machine() {
        return $this->hasOne(Machine::class, 'id', 'machineId');
    }

    public function oeeDetail() {
        return $this->belongsTo(oeeDetail::class, 'id', 'oeeMasterId');
    }
    public function defect()
    {
        return $this->hasMany(OeeDefectLogProduct::class,'oeeMasterId','id');
    }
  
}
