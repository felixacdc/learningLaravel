<?php namespace course;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model {

	// en este caso no se agrega de forma explisita el nombre de la tabla porque Eloquent convierte el nombre de la clase que esta representado por camel case a nombres separados por guiones bajos y pluraliza la ultima palabra, si no se sigue el estandar camel case o el nombre de la tabla difiere de este estandar por ejemplo esta escrito en español, hay que especificar el nombre de la tabla con el protected
	
	//protected $table = 'user_profiles';

	public function getAgeAttribute()
	{
		return \Carbon\Carbon::parse($this->birthdate)->age;
	}

}
