<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_profiles', function(Blueprint $table)
		{
			$table->increments('id');
			$table->mediumText('bio')->nullable();
			$table->string('twitter')->nullable();
			$table->string('website')->nullable();

			$table->integer('user_id')->unsigned(); //unsigned crea un entero sin signo

			// ===== Crear relaciones en migraciones =====
			$table->foreign('user_id') //nombre del campo que se relacionara
				->references('id') //nombre del campo primario
				->on('users') //nombre de la tabla foranea
				->onDelete('cascade'); //activa la eliminacion en cascada

			$table->nullabletimestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_profiles');
	}

}
