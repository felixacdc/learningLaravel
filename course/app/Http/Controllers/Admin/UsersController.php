<?php namespace course\Http\Controllers\Admin;

use course\Http\Requests;
use course\Http\Controllers\Controller;

use course\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Validator;
use course\Http\Requests\CreateUserRequest;
use course\Http\Requests\EditUserRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Route;

class UsersController extends Controller {

	//Recivir datos por medio de Inyeccion de dependencias
	// protected $request;

	public function __construct(Request $request)
	{
		$this->middleware('auth');
		$this->request = $request;

		// Aplicar principio DRY
		$this->beforeFilter('@findUser', ['only' => ['show', 'edit', 'update', 'destroy']]);
	}

	public function findUser(Route $route)
	{
		$this->user = User::findOrFail($route->getParameter('users'));
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::filterAndPaginate($this->request->get('name'), $this->request->get('type'));

		return view('admin.users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CreateUserRequest $request)
	{
		// dd($this->request->all());

		//primera forma de validacion utilizando Validator::make
		// $data = contine los datos a validar
		// $rules = contine las reglas de validacion

		// $data = $this->request->all();

		// $rules = array(
		// 	'first_name' => 'required', 
		// 	'last_name' => 'required', 
		// 	'email' => 'required', 
		// 	'password' => 'required', 
		// 	'type' => 'required'
		// );

		// Segunda forma de validar
		// $this->validate($this->request, $rules);

		// Primera forma de validar
		// $v = \Validator::make($data, $rules);

		// if ($v->fails()) {
			
		// 	return redirect()->back()
		// 		->withErrors($v->errors())
		// 		->withInput($this->request->except('password'));

		// }

		$user = new User($this->request->all());
		$user->save();

		return \Redirect::route('admin.users.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// Cargar el usuario con anterioridad, con la funcion findOrFail cargamos un solo usuario y si no es encontrado despliega un error 404
		$user = User::findOrFail($id);

		return view('admin.users.edit')->with('user', $this->user);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(EditUserRequest $request, $id)
	{
		//$user = User::findOrFail($id);

		//$user->fill($this->request->all());
		//$user->save();

		$this->user->fill($this->request->all());
		$this->user->save();

		return \Redirect::back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		//User::destroy($id);


		$this->user->delete();

		$message = $this->user->full_name . ' fue eliminado/a';

		if ($this->request->ajax()) {
			//return $message; enviar respuesta en formado XML
			/**
			 * envio de respuesta por json
			 */

			return response()->json([
				'id'      => $this->user->id,
				'message' => $message
			]);
		}

		Session::flash('message', $message);
		
		return \Redirect::route('admin.users.index');
	}

}
