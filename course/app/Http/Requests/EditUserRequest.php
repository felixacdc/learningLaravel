<?php namespace course\Http\Requests;

use course\Http\Requests\Request;
// Incluir el Route para poder acceder a los datos mandados por la URL
use Illuminate\Routing\Route;


class EditUserRequest extends Request {

	private $route;

	public function __construct(Route $route)
	{
		$this->route = $route;
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'first_name' => 'required', 
			'last_name' => 'required', 
			'email' => 'required|unique:users,email,' . $this->route->getParameter('users'), 
			'type' => 'required|in:user,admin' //in se utiliza para no permitir valores diferentes a los establecidos
		];
	}

}
