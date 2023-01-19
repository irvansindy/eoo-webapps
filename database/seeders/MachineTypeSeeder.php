<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MachineType;
use Illuminate\Support\Facades\DB;

class MachineTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('machine_types')->insert([
            [
                'name' => 'HDPE'
            ],
            [
                'name' => 'uPVC'
            ],
            [
                'name' => 'Fitting'
            ],
        ]);
    }
}
