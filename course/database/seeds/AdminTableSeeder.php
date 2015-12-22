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
	}
}
