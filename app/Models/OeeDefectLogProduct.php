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
        return $this->hasMany(oeeMaster::class,'id','oeeMasterId');
    }
    public function product(){
        return $this->hasMany(Product::class,'id','productId');
    }
    public function defectName()
    {
        return $this->hasOne(OeeDefect::class,'id','defectId');
    }
    public function detail()
    {
        return $this->hasMany(oeeDetail::class,'id', 'oeeMasterId');
    }
}
