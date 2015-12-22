<?php 

/**
* 
*/

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TagsTableSeeder extends Seeder
{
	
	public function run()
	{
		$faker = Faker::create();

		for ($i=0; $i < 30; $i++) {

			//permite optener el id generado por el insert
			\DB::table('tags')->insert(array(
				'name' => $faker->name('male'|'female'),
				'description' => $faker->paragraph(2)
			));
		}
		
	}
}
