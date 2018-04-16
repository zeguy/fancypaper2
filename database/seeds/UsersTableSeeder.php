<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate([
            'email' => 'tester@fancypaper.com',
            'name' => 'tester',
            'password' => Hash::make('helloworld'),
            'role' => 'admin'
        ]);
    
        $user = User::firstOrCreate([
            'email' => 'jamal@harvard.edu',
            'name' => 'Jamal Harvard',
            'password' => Hash::make('helloworld')
        ]);
    }
}