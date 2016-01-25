<?php namespace course\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Session;

abstract class IsType {

	private $auth;

	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	abstract public function getType();

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if( ! $this->auth->user()->is($this->getType()))
		{

			$this->auth->logout();
			
			if ($request->ajax())
			{
				return response('Unauthorized.', 401);
			}
			else
			{
				Session::flash('message', 'Acceso denegado');
				return redirect()->to('auth/login');
			}

		}

		return $next($request);
	}

}
