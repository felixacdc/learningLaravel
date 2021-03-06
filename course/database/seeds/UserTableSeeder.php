<?php 

/**
* Primer Seeder
*/

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder
{
	
	public function run()
	{
		$faker = Faker::create();

		for ($i=0; $i < 90; $i++) {

			//permite optener el id generado por el insert
			$id = \DB::table('users')->insertGetId(array(
				'first_name' => $faker->firstName,
				'last_name' => $faker->lastName,
				'email' => $faker->unique()->email,
				'password' => \Hash::make('123456'),
				'type' => $faker->randomElement(['user', 'editor', 'contributor', 'subscriber'])
			));

			\DB::table('user_profiles')->insert(array (
				'user_id' => $id,
				'bio' 		=> $faker->paragraph(rand(2, 5)),
				'website' => 'http://www.' . $faker->domainName,
				'twitter' => 'http://www.twitter.com/' . $faker->userName,
				'birthdate' => $faker->dateTimeBetween('-30 years', '-15 years')->format('Y-m-d')
			));
		}
		
	}
}
