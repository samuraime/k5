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

        $paths = explode('/', $_SERVER['REQUEST_URI'], 4);
        if (isset($paths[2]) && (!in_array($paths[2], Session::get('user.permission')))) {
            abort(403, 'Forbidden');
        }
		return $next($request);
	}
}
