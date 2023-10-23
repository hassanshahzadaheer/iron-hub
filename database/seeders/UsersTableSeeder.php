<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
{

    // Create a staff user
    User::create([
        'name' => 'Staff User',
        'email' => 'staff@ironhub.com',
        'password' => bcrypt('password'),
        'role' => 'staff',
    ]);

    // Create a member user
    User::create([
        'name' => 'Member User',
        'email' => 'member@ironhub.com',
        'password' => bcrypt('password'),
        'role' => 'member',
    ]);
}

}
