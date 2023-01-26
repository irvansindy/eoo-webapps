<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OeeDefectLogProduct extends Model
{
    use HasFactory;
    protected $table = 'oee_defect_log_products';
    protected $guarded = [];
    public function oeeMaster(){
        return $this->hasOne(oeeMaster::class,'id','oeeMasterId');
    }
    public function detail(){
        return $this->hasMany(oeeDetail::class,'oeeMasterId','oeeMasterId');
    }
}
