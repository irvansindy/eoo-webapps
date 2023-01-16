<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menus')->insert([
            [
                'menusName'=>'Dashboard',
                'link'=>'home',
                'icon'=>'fas fa-tachometer-alt',
                'status'=>1,
                'type'=>1
            ],
            [
                'menusName'=>'Master',
                'link'=>'',
                'icon'=>'fas fa-home',
                'status'=>2,
                'type'=>1
            ]
        ]
      );
    }
}
