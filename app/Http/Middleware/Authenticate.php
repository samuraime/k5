<?php namespace App\Http\Middleware;

use Session;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class Authenticate {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (!Session::has('user')) {
			return redirect('/');
		}
		return $next($request);
	}
}
