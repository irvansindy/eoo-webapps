<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TempExtruderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('temp_extruders')->insert([
            [
                'name' => 'extruder mini',
                'length' => 10,
            ],
            [
                'name' => 'extruder jumbo',
                'length' => 30,
            ],
        ]);
    }
}
