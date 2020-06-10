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
	   	//DB::table('user')->delete();

	    //Default Admin User for Initial Login
	    $users = array(
	            ['last_name' => 'Dela Cruz', 'first_name' => 'Juan', 'middle_name' => 'Santos', 'suffix_name' => 'NA' 'birthdate' => '1993-12-17', 'gender' => 'M', 'role_id' => '1', 
	            'is_admin' => 'Y', 'username' => 'user', 'email' => 'user@gmail.ph', 'mobile_number' => '0917343117',
				'password' => Hash::make('user')],
	    );
	        
	    foreach ($users as $user)
	    {
	        User::create($user);
	    }  
    }
}
