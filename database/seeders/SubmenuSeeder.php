<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubmenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('submenus')->insert(
            [
                [
                    'submenusName'=>'Office',
                    'menusId'=>2,
                    'link'=>'masterOffice'
                ],
                [
                    'submenusName'=>'Machine',
                    'menusId'=>2,
                    'link'=>'masterMachine'
                ]
            ]
        );
    }
}
