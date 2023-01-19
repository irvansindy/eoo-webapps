<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Irvan Sindy',
            'nik' => '100132',
            'email' => 'irvansindy@pralon.com',
            'password' => Hash::make('pass12345')
        ]);
    }
}
