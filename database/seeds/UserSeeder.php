<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = array(
            ['last_name' => 'Dela Cruz', 'first_name' => 'Juan', 'middle_name' => 'Santos', 'suffix_name' => 'NA', 'birthdate' => '1993-12-17', 'designation' => 'Clerk', 
            'isAdmin' => 'Y', 'username' => 'user', 'email' => 'user@gmail.ph', 'mobile_number' => '0917343117',
            'password' => Hash::make('user')],
    );
        
    foreach ($users as $user)
    {
        User::create($user);
    }  
    }
}
