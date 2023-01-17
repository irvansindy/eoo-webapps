<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class OeeDefect extends Model
{
    use HasFactory, softDeletes;

    protected $table = 'oee_defects';

    protected $fillable = [
        'defectName',
    ];
    // protected $guarded = [];

    protected $hidden = [];
}
