<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MachineCapacity extends Model
{
    use HasFactory;
    protected $table = 'machine_capacities';
    protected $guarded = [];
}
