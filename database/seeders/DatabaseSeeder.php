<?php

namespace Database\Seeders;

use App\Models\Submenus;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            MenusSeeder::class,
            SubmenuSeeder::class,
            UserSeeder::class,
            MachineTypeSeeder::class,
            OeeDetailsSeeder::class,
            TempExtruderSeeder::class
        ]);
    }
}
