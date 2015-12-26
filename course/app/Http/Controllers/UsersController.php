<?php namespace course\Http\Controllers;


/**
* Controlador consulta de usuarios
*/

use course\User;

class UsersController extends Controller
{
	public function getOrm()
	{
		//$users = User::get();
		$users = User::select('id', 'first_name')
		//se utiliza en vez del join
		->with('profile')
		->where('first_name', '<>', 'Felix')
		->orderBy('first_name', 'ASC')
		->get();
		//$user = User::first();
		//para hacer referencia al metodo getFullNameAttribute por medio de los metodos magicos y propiedades magicas de PHP
		//dd($user->full_name);
		//dd($user->profile->age);
		dd($users->toArray());
	}

	//crear consultas utilizando fluent
	public function getIndex()
	{
		
		// consulta a la tabla usuarios (la primera sirve para consultar todos los datos)
		// $result = \DB::table('users')->get();
		$result = \DB::table('users')
			->select(
				'users.*',
				'user_profiles.id as profile_id',
				'user_profiles.twitter',
				'user_profiles.birthdate'
				)
			//->where('first_name', '<>' , 'Felix')
			//agregar funciones extras de sql
			//->orderBy(\DB::raw('RAND()'))
			->orderBy('id', 'ASC')
			//->join('user_profiles', 'users.id', '=', 'user_profiles.user_id')
			->leftjoin('user_profiles', 'users.id', '=', 'user_profiles.user_id')
			//obtengo solo el primer valor
			->get();

		foreach ($result as $row) {
			$row->full_name = $row->first_name . ' ' . $row->last_name;
			//componente de laraver que sirve para trabajar con fechas
			$row->age = \Carbon\Carbon::parse($row->birthdate)->age;
		}
		//$result->full_name = $result->first_name . ' ' . $result->last_name;
		// metodo que utiliza laravel que es parte de symphony que imprime dates de forma mas legible
		//dd($result->full_name);

		dd($result);

		return $result;

	}

}