<?php namespace course\Http\Controllers;


/**
* Controlador consulta de usuarios
*/

class UsersController extends Controller
{
	
	//crear consultas utilizando fluent
	public function getIndex(){
		
		// consulta a la tabla usuarios (la primera sirve para consultar todos los datos)
		// $result = \DB::table('users')->get();
		$result = \DB::table('users')
			->select(
				'users.*',
				'user_profiles.id as profile_id',
				'user_profiles.twitter'
				)
			//->where('first_name', '<>' , 'Felix')
			//agregar funciones extras de sql
			//->orderBy(\DB::raw('RAND()'))
			->orderBy('first_name', 'ASC')
			//->join('user_profiles', 'users.id', '=', 'user_profiles.user_id')
			->leftjoin('user_profiles', 'users.id', '=', 'user_profiles.user_id')
			->get();

		// metodo que utiliza laravel que es parte de symphony que imprime dates de forma mas legible
		dd($result);

		return $result;

	}
}