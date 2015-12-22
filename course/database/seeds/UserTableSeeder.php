<?php 

/**
* Primer Seeder
*/

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
	
	public function run()
	{
		\DB::table('users')->insert(array(
			'name' => 'Felix',
			'email' => 'pfmata01@gmail.com',
			'password' => \Hash::make('secret')
		));
	}
}
