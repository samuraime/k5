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

        $path = explode('/', $_SERVER['REQUEST_URI'], 4)[2];
        if (strstr(Session::get('user')['permissions'], $path) == null) {
            abort(401);
        }
		return $next($request);
	}
}
