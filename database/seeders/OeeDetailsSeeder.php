<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OeeDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oee_details')->insert([
            [
                'oeeMasterId' => 1,
                'productId' => 1,
                'machineId' => 1,
                'tempExtruderId' => 1,
                'zoneNumber' => 1,
                'adapterZone' => 1.0,
                'oeeDetailValue' => 1.0,
                'date' => '2023-01-15',
                'time' => '20:20:00',
                'screwSpeed' => 5.0,
                'dosingSpeed' => 6.0,
                'mainDrive' => 7.4,
                'vacumCylinder' => 9.1,
                'meltPressure' => 3.4,
                'vacumTank' => 5.7,
                'haulOffSpeed' => 8.2,
                'waterTempVacumTank' => 10.8,
                'waterPressure' => 13.2,
            ],
            [
                'oeeMasterId' => 1,
                'productId' => 1,
                'machineId' => 1,
                'tempExtruderId' => 2,
                'zoneNumber' => 2,
                'adapterZone' => 4.0,
                'oeeDetailValue' => 5.0,
                'date' => '2023-01-15',
                'time' => '23:20:00',
                'screwSpeed' => 6.0,
                'dosingSpeed' => 4.0,
                'mainDrive' => 7.0,
                'vacumCylinder' => 8.1,
                'meltPressure' => 3.9,
                'vacumTank' => 9.0,
                'haulOffSpeed' => 6.2,
                'waterTempVacumTank' => 11.8,
                'waterPressure' => 15.2,
            ],
        ]);
    }
}
