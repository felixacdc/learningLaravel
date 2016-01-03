<?php namespace course;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	//colocar las columnas o campos que queremos gravar
	protected $fillable = ['first_name', 'last_name', 'name', 'email', 'password', 'type'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function profile()
	{
		return $this->hasOne('course\UserProfile');
	}

	public function getFullNameAttribute()
	{
		return $this->first_name . ' ' . $this->last_name;
	}

	//metodo para encriptar la contraseña
	//en este metodo se agregan todas las funciones al atributo password
	public function setPasswordAttribute($value)
	{
		if ( ! empty($value)) {
			$this->attributes['password'] = \Hash::make($value);
		}
		
	}

}
