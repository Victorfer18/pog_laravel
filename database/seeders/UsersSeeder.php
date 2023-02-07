<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::create([
        //     'firstName' => 'Victor',
        //     'lastName' => 'Magalhaes',
        //     'email' => 'victorfernandomagalhaes@gmail.com',
        //     'password' => bcrypt('1234567890')
        // ]);
        User::factory(10)->create();
    }
}
