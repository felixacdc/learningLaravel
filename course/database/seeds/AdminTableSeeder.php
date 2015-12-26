<?php 

/**
* Primer Seeder
*/

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
	
	public function run()
	{
		\DB::table('users')->insert(array(
			'first_name' => 'Felix',
			'last_name' => 'Mendez',
			'email' => 'pfmata01@gmail.com',
			'password' => \Hash::make('secret'),
			'type' => 'admin'
		));

		\DB::table('user_profiles')->insert(array (
				'user_id' => 1,
				'birthdate' => '1994/02/23'
			));
	}
}
