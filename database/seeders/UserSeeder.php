<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'johndoe',
            'password' => bcrypt('secret')
        ]);

        User::create([
            'username' => 'sherly',
            'password' => bcrypt('secret')
        ]);
    }
}
